<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\Transaction;
use App\Models\TicketType;
use App\Models\Booking;
use App\Models\Seat;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function redirectToGateway(Request $request)
    {
        if (!$this->hasRequiredSessionData()) {
            return Redirect::back()->withErrors(['error' => 'Missing required session data']);
        }

        $user = $request->user();
        $trip_id =  Session::get('trip_id');
        $seat_id =  Session::get('seat_id');
        $seat_class =  Session::get('coach_class');

        $tickettype = $this->getTicketType($trip_id, $seat_class);
        $paymentDetails = $this->createPaymentDetails($user, $tickettype);
        $booking = $this->createBooking($user, $trip_id, $seat_id, $paymentDetails['reference']);

        Session::put(['booking' => $booking]);
        Session::put(['tickettype' => $tickettype]);

        return $this->getPaymentUrl($paymentDetails);
    }

    public function handleGatewayCallback()
    {
        try {
            $paymentDetails = Paystack::getPaymentData();
            $booking = Session::get('booking');
            $tickettype = Session::get('tickettype');

            return $this->handlePaymentStatus($paymentDetails, $booking);
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return redirect('trips')->with('error', 'Payment processing failed');
        }
    }

    private function hasRequiredSessionData()
    {
        $requiredSessionData = ['trip_id', 'seat_id', 'coach_id', 'coach_class'];
        return Session::has($requiredSessionData);
    }

    private function createPaymentDetails($user, $tickettype )
    {
        $reference = Paystack::genTranxRef();
        $amount = $tickettype->price;

        return [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'amount' => $amount * 100,
            'email' => $user->email,
            'currency' => 'NGN',
            'reference' => $reference,
            'metadata' => [
                'cancel_action' => 'https://ticketer-captjay98.koyeb.app/trips',
                'custom_fields' => [
                    [
                        'display_name' => 'Customer Name',
                        'variable_name' => 'customer_name',
                        'value' => "$user->first_name $user->first_name",

                    ],
                ],
            ],
        ];
    }

    private function getTicketType($trip_id = null, $seat_class = null)
    {
        return TicketType::where('trip_id', $trip_id)
            ->where('seat_class', $seat_class)->firstOrFail();
    }

    private function createBooking($user, $seat_id, $trip_id, $reference)
    {
        return Booking::create(
            [
                'user_id' => $user->id,
                'seat_id' => $seat_id,
                'trip_id' => $trip_id,
                'reference' => $reference,
                'status' => 'pending',
            ]
        );
    }

    private function getPaymentUrl($paymentDetails)
    {
        $payment_url = Paystack::getAuthorizationUrl($paymentDetails)->url;
        try {
            return Inertia::location($payment_url);
        } catch (\Exception $e) {
            return Redirect::back()->with('message', 'An error occured. Please refresh the page and try again. If error persists, Kindly contact admin at ticketeradmin@mail.com . Thank You.');
        }
    }

    private function handlePaymentStatus($paymentDetails, $booking)
    {
        $status = $paymentDetails['data']['status'];
        if ($status === "success") {
            return $this->onPaymentSuccess($paymentDetails, $booking);
        } else {
            return $this->onPaymentFailure($paymentDetails, $booking);
        }
    }

    private function onPaymentSuccess($paymentDetails, $booking)
    {
        $transaction = $this->recordTransaction($paymentDetails, $booking, 'success');

        $booking->update(['status' => 'confirmed']);

        Seat::where('id', $booking->seat_id)->update(['status' => 'booked']);

        return redirect(route('ticket.create'));
    }

    private function onPaymentFailure($paymentDetails, $booking)
    {
        $transaction = $this->recordTransaction($paymentDetails, $booking, 'failed');

        $booking->update(['status' => 'failed']);

        Seat::where('id', $booking->seat_id)->update(['status' => 'available']);

        return redirect(route('trips'))->with('message', 'Payment failed. Please try again.');
    }

    private function recordTransaction($paymentDetails, $booking, $status)
    {
        return Transaction::create(
            [
                'booking_id' => $booking->id,
                'user_id' => $booking->user_id,
                'amount' => $paymentDetails['data']['amount'],
                'transaction_reference' => $paymentDetails['data']['reference'],
                'status' => $status,
            ]
        );
    }
};
