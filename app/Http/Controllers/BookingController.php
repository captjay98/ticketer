<?php

namespace App\Http\Controllers;

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
     */
    public function getCoaches($trip_id, $tickettype)
    {
        $trip = Trip::find($trip_id);
        $coaches = $trip->coaches->where('coach_class', $tickettype);
        return Inertia::render('Coaches', ['coaches' => $coaches, 'trip' => $trip]);
    }


    /**
     *  Show All Available Seats
     */
    public function getAvailableSeats($trip_id, $coach_id)
    {
        $seats = Seat::with('coach')
        ->where('trip_id', $trip_id)
        ->where('coach_id', $coach_id)
        ->orderBy('id', 'asc')
            ->get();
        return Inertia::render('Seats', ['seats' => $seats]);
    }

    /**
     * Reserve a Seat
     */
    public function reserveSeat(Request $request)
    {
        $seat_id = $request->input('seat_id');
        $trip_id = $request->input('trip_id');
        $coach_id = $request->input('coach_id');
        $coach_class = $request->input('coach_class');


        try {
            // DB::beginTransaction();
            Seat::where('id', $seat_id)
            ->where('trip_id', $trip_id)
            ->where('coach_id', $coach_id)
            ->update(['status' => 'reserved']);

            // DB::commit();
        } catch (\Exception $e) {
            dd($e);
            // DB::rollBack();

        }

          return redirect('pay')->with(['seat_id' => $seat_id, 'trip_id' => $trip_id, 'coach_id' => $coach_id, 'coach_class' => $coach_class]);
    }


}
