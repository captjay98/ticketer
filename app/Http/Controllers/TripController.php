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
        $trips = cache()->remember('home_trips', now()->startOfDay()->diffInMinutes(), fn () => Trip::where('date', '>', now())->with('ticketTypes')->orderBy('date')->get());
        return Inertia::render('Trips', ['trips' => $trips]);
    }

    /**
     * Display the result of the searced trips
     */
    public function searchIndex(Request $request)
    {
        $source = $request->input('source');
        $destination = $request->input('destination');

        $trips = Trip::where('source', $source)
            ->where('destination', $destination)
            ->where('date', '>', now())
            ->with('ticketTypes')
            ->get();

        cache()->forget("trips");

        return Inertia::render('Trips', ['trips' => $trips]);
    }

    /**
     * Display the specified resource.
     */
    public function show($trip_id)
    {
        $cacheKey = "trip_details_{$trip_id}";

        $trip = cache()->remember($cacheKey, now()->startOfDay()->diffInMinutes(), function () use ($trip_id) {
            return Trip::with('ticketTypes')->where('id', $trip_id)->first();
        });

        return Inertia::render('Trip', ['trip' => $trip]);
    }
}
