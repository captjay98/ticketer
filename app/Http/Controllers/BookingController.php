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
     * Display a listing of the resource.
     */

    public function getAvailableSeats($trip_id, $coach_id)
    {
        $seats = Seat::with('coach')
        ->where('trip_id', $trip_id)
        ->where('coach_id', $coach_id)
        ->orderBy('id', 'asc')
            ->get();
        // dd($seats);
        return Inertia::render('Seats', ['seats' => $seats]);
    }

    public function reserveSeat(Request $request)
    {
        // dd($request->all());
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
        // return Inertia::redirect ('Booking');

    }

    public function bookSeat(Request $request)
    {
        $seat_number = $request->input('seat_number');
        $trip_id = $request->input('trip_id');
        $coach_id = $request->input('coach_id');

        try {
            // DB::beginTransaction();
            Seat::where('trip_id', $trip_id)
            ->where('coach_id', $coach_id)
            ->where('seat_number', $seat_number)
            ->update(['status' => 'reserved']);

            // DB::commit();
        } catch (\Exception $e) {
            // DB::rollBack();

        }

    }



    public function getCoaches($trip_id, $tickettype)
    {
        $trip = Trip::find($trip_id);
        $coaches = $trip->coaches->where('coach_class', $tickettype);
        // dd($coaches, $trip);
        return Inertia::render('Coaches', ['coaches' => $coaches, 'trip' => $trip]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
