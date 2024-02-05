<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    /**
     *  Create a New Ticket
     */
    public function createTicket()
    {
        $booking = Session::get('booking');
        $tickettype = Session::get('tickettype');

        $ticket = Ticket::create(
            [
                'user_id' => auth()->id(),
                'seat_id' => $booking->seat->id,
                'ticket_type' => $tickettype->id,
                'trip_id' => $booking->trip->id,
                'booking_id' => $booking->id,
                'ticket_type_id' => $tickettype->id,
                'expires_at' => $booking->trip->departure_time,
            ]
        );


        $data = "Ticket ID: {$ticket->id}\n
                Ticket Serial Number: {$ticket->serial_number}\n
                Booking ID: {$booking->id}\n
                Seat ID: {$ticket->seat->id}\n
                Ticket Type: {$tickettype->name}\n
                Trip: {$booking->trip->title}-{$booking->trip->date}\n
                Expires: {$booking->trip->departure_time}";

        $qrCode = QrCode::format('png')->size(200)->generate($data);
        $qrCodePath = "qrcodes/{$ticket->id}.png";
        Storage::disk('public')->put($qrCodePath, $qrCode);

        $ticket->update(['qr_code' => $qrCodePath]);
        $booking->update(['ticket_id' => $ticket->id]);

        Session::forget(['booking', 'tickettype', 'trip_id', 'seat_id', 'coach_id', 'coach_class']);
        return redirect(route('ticket.show.created'))->with(['ticket_id' => $ticket->id]);
    }

    /**
     *  Show Ticket
     */
    public function showCreatedTicket()
    {

        $ticket_id = Session::get('ticket_id');
        $ticket = Ticket::with('user', 'seat', 'ticket_type', 'trip', 'seat.coach')->where('id', $ticket_id)->first();
        return Inertia::render('Ticket', ['ticket' => $ticket]);
    }


    /**
     * Show All Tickets
     */
    public function showTickets()
    {
        $user = auth()->user();
        $tickets = Ticket::where('user_id', $user->id);
        return Inertia::render('Tickets', ['tickets' => $tickets]);
    }


    /**
     *  Show Ticket
     */
    public function showTicket($ticket_id)
    {
        $ticket = Ticket::with('user', 'seat', 'ticket_type', 'trip', 'seat.coach')->where('id', $ticket_id)->first();
        return Inertia::render('Ticket', ['ticket' => $ticket]);
    }
}
