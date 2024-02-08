<?php

namespace App\Http\Controllers;

use App\Events\TripCreated;
use App\Models\Seat;
use App\Models\Coach;
use App\Models\Booking;
use App\Models\TicketType;
use App\Models\Ticket;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::take(10)->get();
        $trips = Trip::take(10)->get();
        return Inertia::render('Admin/ADashboard', ['users' => $users, 'trips' => $trips]);
    }

    /**
     * Show All Users.
     */
    public function allUsers()
    {
        $users = User::get();
        return Inertia::render('Admin/Users', ['users' => $users]);
    }

    /**
     * Show One User.
     */
    public function oneUser($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return Inertia::render('Admin/User', ['user' => $user]);
    }

    /**
     * Show All Trips.
     */
    public function allTrips()
    {
        $trips = Trip::get();
        return Inertia::render('Admin/Trips', ['trips' => $trips]);
    }

    /**
     * Show One Trip.
     */
    public function oneTrip($trip_id)
    {
        $trip = Trip::where('id', $trip_id)->first();
        return Inertia::render('Admin/Trip', ['trip' => $trip]);
    }

    /**
     * Show the form for creating a new Trip.
     */
    public function showCreateTrip()
    {
        $coaches = Coach::get();
        return Inertia::render('Admin/CreateTrip', ['coaches' => $coaches]);
    }

    /**
     * Create a Trip.
     */
    public function createTrip(Request $request)
    {
        $trip_details = $request->except('coaches');
        $coaches = $request->input('coaches');
        $trip = Trip::create($trip_details);
        foreach ($coaches as $coach) {
            $coachId = $coach['id'];
            $trip->coaches()->attach($coachId);
        }
        event(new TripCreated($trip));

        return Inertia::render('Admin/Trip', ['trip' => $trip]);
    }

    /**
     * Update a Trip.
     */
    public function updateTrip(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show All Tickets.
     */
    public function allTickets()
    {
        $tickets = Ticket::with('trip', 'ticketType', 'seat')->get();
        return Inertia::render('Admin/Tickets', ['tickets' => $tickets]);
    }

    /**
     * Show One Ticket.
     */
    public function OneTicket()
    {
        $ticket = Ticket::get();
        return Inertia::render('Admin/Ticket', ['ticket' => $ticket]);
    }

    /**
     * Show TicketTypes.
     */
    public function allTicketTypes()
    {
        $ticket_types = TicketType::with('trip')->get();
        return Inertia::render('Admin/TicketTypes', ['tickettypes' => $ticket_types]);
    }

    /**
     * Show One Ticket Type.
     */
    public function oneTicketType($ticket_id)
    {
        $ticket_type = Ticket::get('id', $ticket_id);
        return Inertia::render('Admin/TicketType', ['ticket_type' => $ticket_type]);
    }

    /**
     * Display a Form for Craeting a TicketType.
     */
    public function showCreateTicketType()
    {
        $trips = Trip::get();
        return Inertia::render('Admin/CreateTicketType', ["trips" => $trips]);
    }

    /**
     * Create a TicketTyppe
     */
    public function createTicketType(Request $request)
    {

        $ticket_type = TicketType::create($request->only(['seat_class', 'price', 'trip_id']));
        return Inertia::render('Admin/TicketType', ['ticket_type' => $ticket_type]);
    }

    /**
     * Show all Coaches
     */
    public function allCoaches()
    {
        $coaches = Coach::get();
        return Inertia::render('Admin/Coaches', ['coaches' => $coaches]);
    }


    /**
     * Show One Coach
     */
    public function oneCoach($coach_id)
    {
        $coach = Coach::where('id', $coach_id)->first();
        return Inertia::render('Admin/Coach', ['coach' => $coach]);
    }

    /**
     * Display Form for creating coaches
     */
    public function showCreateCoach()
    {
        return Inertia::render('Admin/CreateCoach',);
    }

    /**
     * Create a Coach
     */
    public function createCoach(Request $request)
    {
        $validated_data = $request->validate([]);
        $coach_name = $request->only('coach_name');
        $coach_class = $request->only('coach_class');
        $capacity = $request->only('capacity');
        $is_active = $request->only('is_active');
        $coach = Coach::create(
            [
                'coach_name' => $coach_name,
                'coach_class' => $coach_class,
                'capacity' => $capacity,
                'is_active' => $is_active,
            ]
        );
        return redirect(route('admin.coaches.all'));
    }

    /**
     * Show all Seats
     */
    public function allSeats()
    {
        $seats = Seat::with('trip', 'coach')->orderBy('updated_at', 'desc')->paginate(50);
        // dd($seats);
        return Inertia::render('Admin/Seats', ['items' => $seats]);
    }

    /**
     * Show All Bookings
     */
    public function allBookings()
    {
        $bookings = Booking::with('user', 'trip')->get();
        // dd($bookings);
        return Inertia::render('Admin/Bookings', ['bookings' => $bookings]);
    }
}
