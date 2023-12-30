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

    public function allUsers()
    {
        $users = User::get();
        return Inertia::render('Admin/Users', ['users' => $users]);
    }

    public function oneUser($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return Inertia::render('Admin/User', ['user' => $user]);
    }

    public function allTrips()
    {
        $trips = Trip::get();
        return Inertia::render('Admin/Trips', ['trips' => $trips]);
    }

    public function oneTrip($trip_id)
    {
        $trip = Trip::where('id', $trip_id)->first();
        return Inertia::render('Admin/Trip', ['trip' => $trip]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showCreateTrip()
    {
        $coaches = Coach::get();
        return Inertia::render('Admin/CreateTrip', ['coaches' => $coaches]);
    }

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


    public function updateTrip(Request $request)
    {
        dd($request->all());
    }

    public function allTickets()
    {
        $tickets = Ticket::get();
        return Inertia::render('Admin/Tickets', ['tickets' => $tickets]);
    }


    public function OneTicket()
    {
        $ticket = Ticket::get();
        return Inertia::render('Admin/Ticket', ['ticket' => $ticket]);
    }


    public function allTicketTypes()
    {
        $tickettypes = TicketType::with('trip')->get();
        return Inertia::render('Admin/TicketTypes', ['tickettypes' => $tickettypes]);
    }


    public function oneTicketType($ticket_id)
    {
        $tickettype = Ticket::get('id', $ticket_id);
        return Inertia::render('Admin/TicketType', ['tickettype' => $tickettype]);
    }

    public function showCreateTicketType()
    {
        $trips = Trip::get();
        return Inertia::render('Admin/CreateTicketType', ["trips" => $trips]);
    }

    public function createTicketType(Request $request)
    {
        // dd($request->only(['seat_class','price','trip_id']));

        $tickettype = TicketType::create($request->only(['seat_class','price','trip_id']));
        dd($tickettype);
        return Inertia::render('Admin/TicketType', ['tickettype' => $tickettype]);
    }

    public function allCoaches()
    {
        $coaches = Coach::get();
        return Inertia::render('Admin/Coaches', ['coaches' => $coaches]);
    }


    public function oneCoach($coach_id)
    {
        $coach = Coach::where('id', $coach_id)->first();
        return Inertia::render('Admin/Coach', ['coach' => $coach]);
    }


    public function showCreateCoach()
    {
        // $trips = Trip::get();
        return Inertia::render('Admin/CreateCoach', );
    }


    public function createCoach(Request $request)
    {
        // dd($request->all());
        $coach_name = $request->only('coach_name');
        $coach_class = $request->only('coach_class');
        $capacity = $request->only('capacity');
        $is_active = $request->only('is_active');
        Coach::create($request->all());
        // dd($coach_class, $coach_name, $capacity, $is_active);
        // $coach = Coach::create([
        //     'coach_name' => $coach_name,
        //     'coach_class' => $coach_class,
        //     'capacity' => $capacity,
        //     'is_active' => $is_active,
        // ]);
        return redirect(route('admin.coaches.all'));
        // return Inertia::render('Admin/Coach', ['coach' => $coach]);

    }

    public function allSeats()
    {
        $seats = Seat::with('trip', 'coach')->paginate(20);
        return Inertia::render('Admin/Seats', ['seats' => $seats]);
    }



    public function allBookings()
    {
        $bookings = Booking::get();
        return Inertia::render('Admin/Bookings', ['bookings' => $bookings]);
    }



}
