<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTicket()
    {
        $booking = Session::get('booking');
        $tickettype = Session::get('tickettype');
        // dd($booking, $tickettype);


        $ticket = Ticket::create(
            [
            'user_id' => auth()->id(),
            'seat_id' => $booking->seat->id,
            'ticket_type' => $tickettype->id,
            'trip_id' => $booking->trip->id,
            'booking_id' => $booking->id,
            'ticket_type_id' => $tickettype->id,
            // 'serial_number' => uniqid($more_entropy = true),
            'expires_at' => $booking->trip->departure_time,
]
        );
        Session::put(['ticket' => $ticket]);
        return redirect(route('ticket.show'));
        // dd($ticket);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function showTicket(Request $request)
    {

        $ticket = Session::get('ticket');
        // dd(auth()->id());
        $user = $ticket->user;
        $trip = $ticket->trip;
        $tickettype = $ticket->ticket_type;
        $seat = $ticket->seat;
        $coach = $ticket->seat->coach;
        // dd($user);

        return Inertia::render('Ticket', [
            'ticket' => $ticket, 'user' => $user,
            'trip' => $trip, 'tickettype' => $tickettype,
            'seat' => $seat, 'coach' => $coach]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
