<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\Transaction;
use App\Models\TicketType;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Booking;
use App\Models\Seat;
use Inertia\Inertia;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        $requiredSessionData = ['trip_id', 'seat_id', 'coach_id', 'coach_class'];
        if (!Session::has($requiredSessionData)) {
            return Redirect::back()->withErrors(['error' => 'Missing required session data']);
        }
        $user = $request->user();

        $trip_id = Session::get('trip_id');
        $seat_id = Session::get('seat_id');
        $coach_id = Session::get('coach_id');
        $seat_class = Session::get('coach_class');

        $tickettype = TicketType::where('trip_id', $trip_id)
                ->where('seat_class', $seat_class)->first();

        $amount = $tickettype->price;
        $reference = Paystack::genTranxRef();

        $paymentDetails = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'amount' => $amount * 100,
            'email' => $user->email,
            'currency' => 'NGN',
            'reference' => $reference,
            'metadata' => [
              'cancel_action' => 'https://trusted-pumped-dane.ngrok-free.app/trips',
              'custom_fields' => [
                  [
                      'display_name' => 'Customer Name',
                      'variable_name' => 'customer_name',
                      'value' => "Test User",
              ],
            ],
          ],
        ];

        $booking = Booking::create(
            [
                'user_id' => $user->id,
                'seat_id' => $seat_id,
                'trip_id' => $trip_id,
                'reference' => $reference,
                'status' => 'pending',
            ]
        );
        Session::put(['booking' => $booking]);
        Session::put(['tickettype' => $tickettype]);

        $payment_url = Paystack::getAuthorizationUrl($paymentDetails)->url;
        try {
            return Inertia::location($payment_url);
        } catch(\Exception $e) {
            dd($e);
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        try {
            $paymentDetails = Paystack::getPaymentData();
            $booking = Session::get('booking');
            $tickettype = Session::get('tickettype');
            $status = $paymentDetails['data']['status'];

            if ($status === "success") {
                $booking->status = "success";
                Seat::where('id', $booking->seat_id)->update(['status' => 'booked']);
                $transaction = Transaction::create([
                      'booking_id' => $booking->id,
                      'transaction_ref' => $paymentDetails['data']['reference'],
                      'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
                      'status' => $status,
                      'amount' => $paymentDetails['data']['amount'],
                      'currency' => $paymentDetails['data']['currency'],
                  ]);

                return redirect(route('ticket.create'));
            }
            if ($paymentDetails->status !== "success") {
                Booking::where('reference', $paymentDetails->reference)->update('status', $paymentDetails->status);
                return Inertia::render('Trips', );
            }
        } catch(\Exception $e) {
            dd($e);
            Log::error('Payment Error:'. $e->getMessage());
            return redirect('trips');
        }
                // Now you have the payment details,
                // you can store the authorization_code in your db to allow for recurrent subscriptions
                // you can then redirect or do whatever you want
    }


}



// $ticket = Ticket::create(
//     [
//     'seat_id' => $booking->seat->id,
//     'ticket_type' => $tickettype->id,
//     'trip_id' => $booking->trip,
//     'booking_id' => $booking->id,
//     'serial_number' => uniqid($more_entropy = true),
//     'expires_at' => $booking->trip->departure_time,
// ]
// );

// $booking->update('ticket_id', $ticket->id);
