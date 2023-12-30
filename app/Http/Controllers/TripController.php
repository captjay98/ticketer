<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return Inertia::render('Trips', ['trips' => $trips]);
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
    public function show($trip_id)
    {
        $trip = Trip::with('tickettypes')->where('id', $trip_id)->first();
        // dd($trip);
        // $tickettypes = TicketType::where('trip_id', $trip_id)->get();
        // dd($trip);
        return Inertia::render('Trip', ['trip' => $trip, ]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
