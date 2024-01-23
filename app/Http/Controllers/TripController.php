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
    }

    public function searchIndex(Request $request)
    {
        $source = $request->only('source');
        $destination = $request->only('destination');
        $filter = [['source' => $source, 'destination' => $destination]];
        $trips = Trip::where('source', $source)->where('destination', $destination)->with('tickettypes')->get();
        return Inertia::render('Trips', ['trips' => $trips]);
    }

    /**
     * Display the specified resource.
     */
    public function show($trip_id)
    {
        $trip = Trip::with('tickettypes')->where('id', $trip_id)->first();
        return Inertia::render('Trip', ['trip' => $trip,]);

        //
    }
}
