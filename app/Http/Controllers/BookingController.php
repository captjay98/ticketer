<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\CoachTrip;
use App\Models\Trip;
use App\Models\Coach;
use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    /**
     * Show All Coaches
     *
     * @param int $trip_id
     * @param string $tickettype
     * @return \Inertia\Response
     */
    public function getCoaches($trip_id, $tickettype)
    {
        // Retrieve the trip with coaches of a specific ticket type
        $trip = Trip::with(['coaches' => function ($query) use ($tickettype) {
            $query->where('coach_class', $tickettype);
        }])->find($trip_id);

        if ($trip) {
            $coaches = $trip->coaches;
            return Inertia::render('Coaches', ['coaches' => $coaches, 'trip' => $trip]);
        }
    }

    /**
     * Show All Available Seats
     *
     * @param int $trip_id
     * @param int $coach_id
     * @return \Inertia\Response
     */
    public function getAvailableSeats($trip_id, $coach_id)
    {
        // Retrieve all available seats for a specific trip and coach
        $seats = Seat::with('coach')
            ->where('trip_id', $trip_id)
            ->where('coach_id', $coach_id)
            ->orderBy('id', 'asc')
            ->get();

        return Inertia::render('Seats', ['seats' => $seats]);
    }

    /**
     * Reserve a Seat
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reserveSeat(Request $request)
    {
        $seat_id = $request->input('seat_id');
        $trip_id = $request->input('trip_id');
        $coach_id = $request->input('coach_id');
        $coach_class = $request->input('coach_class');


        try {
            DB::beginTransaction();

            Seat::where('id', $seat_id)
                ->update(['status' => 'reserved']);

            DB::commit();

        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('message', 'Error reserving seat, try another seat.');
        }

        return redirect('pay')->with(['seat_id' => $seat_id, 'trip_id' => $trip_id, 'coach_id' => $coach_id, 'coach_class' => $coach_class]);
    }
}
