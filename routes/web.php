<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TripController;
use App\Models\TicketType;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Trip;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        // $trips = cache()->remember('home_trips', now()->startOfDay()->diffInMinutes(), fn () => Trip::where('date', '>', now())->orderBy('date')->take(10)->with('ticketTypes')->get());
        $trips =  Trip::where('date', '>', now())->orderBy('date')->take(10)->with('ticketTypes')->get();
        return Inertia::render(
            'Welcome',
            [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
                'trips' =>  $trips,
            ]
        );
    }
)->name('home');

Route::get(
    '/dashboard',
    function () {
        return Inertia::render('profile.edit');
    }
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Show tickets
        // Show ticket
    }
);


Route::get('/trips', [TripController::class, 'index'])->name('trips.all');
Route::get('/trips/{trip_id}', [TripController::class, 'show'])->name('trips.one');
Route::post('/trips', [TripController::class, 'searchIndex'])->name('trips.search');
Route::get('trips/{trip_id}/coaches/{tickettype}', [BookingController::class, 'getCoaches'])->name('coaches.all');
Route::get('trips/{trip_id}/coaches/{coach_id}/seats', [BookingController::class, 'getAvailableSeats'])->name('seats.all');
Route::middleware(['auth'])->group(
    function () {
        Route::post('/seats/reserve', [BookingController::class, 'reserveSeat'])->name('seats.reserve');
        Route::get('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
        Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment');
        Route::get('/success', [PaymentController::class, 'success'])->name('succesful');
        Route::get('/ticket/create', [TicketController::class, 'createTicket'])->name('ticket.create');
        Route::get('ticket', [TicketController::class, 'showCreatedTicket'])->name('ticket.show.created');
        Route::get('ticket/{ticket_id}', [TicketController::class, 'showTicket'])->name('ticket.show');
    }
);

// Route::middleware('throttle:2:1');
// Route::middleware(['auth', 'is_admin:"true"'])->group(function () {

Route::middleware(['auth', 'checkStaff'])->group(
    function () {
        Route::name('admin.')->prefix('admin')->group(
            function () {
                Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

                Route::get('/users', [AdminController::class, 'allUsers'])->name('users.all');
                Route::get('/users/{user_id}', [AdminController::class, 'oneUser'])->name('users.one');
                Route::put('/users/{user_id}', [AdminController::class, 'deactivateUser'])->name('users.deactivate')->middleware('checkAdmin');

                Route::get('/travellers', [AdminController::class, 'allTravellers'])->name('Travellers.all');
                Route::get('/travellers/{user_id}', [AdminController::class, 'oneTraveller'])->name('traveller.one');

                Route::get('/trips', [AdminController::class, 'allTrips'])->name('trips.all');
                Route::get('/trips/create', [AdminController::class, 'showCreateTrip'])->name('trips.showcreate')->middleware('checkAdmin');
                Route::post('/trips', [AdminController::class, 'createTrip'])->name('trips.create')->middleware('checkAdmin');
                Route::patch('/trips', [AdminController::class, 'updateTrip'])->name('trips.update')->middleware('checkAdmin');
                Route::get('/trips/{trip_id}', [AdminController::class, 'oneTrip'])->name('trips.one');

                Route::get('/tickets', [AdminController::class, 'allTickets'])->name('tickets.all');
                Route::post('/tickets/create', [AdminController::class, 'createTicket'])->name('tickets.create')->middleware('checkAdmin');
                Route::put('/tickets/update', [AdminController::class, 'updateTicket'])->name('tickets.update')->middleware('checkAdmin');
                Route::get('/tickets/{ticket_id}', [AdminController::class, 'oneTicket'])->name('tickets.one');

                Route::get('/tickettypes', [AdminController::class, 'allTicketTypes'])->name('tickettypes.all');
                Route::get('/tickettype/create', [AdminController::class, 'showCreateTicketType'])->name('tickettypes.showcreate')->middleware('checkAdmin');
                Route::post('/tickettype/create', [AdminController::class, 'createTicketType'])->name('tickettypes.create')->middleware('checkAdmin');
                Route::put('/tickettype/update', [AdminController::class, 'updateTicketType'])->name('tickettypes.update')->middleware('checkAdmin');
                Route::get('/tickettype/{tickettype}', [AdminController::class, 'oneTicketType'])->name('tickettypes.one');

                Route::get('/coaches', [AdminController::class, 'allCoaches'])->name('coaches.all');
                Route::get('/coaches/create', [AdminController::class, 'showCreateCoach'])->name('coaches.showcreate')->middleware('checkAdmin');
                Route::post('/coaches/create', [AdminController::class, 'createCoach'])->name('coaches.create')->middleware('checkAdmin');
                Route::put('/coaches/update', [AdminController::class, 'updateCoach'])->name('coaches.update')->middleware('checkAdmin');
                Route::get('/coaches/{coaches}', [AdminController::class, 'oneCoach'])->name('coaches.one');

                Route::get('/seats', [AdminController::class, 'allSeats'])->name('seats.all');
                Route::get('/seats/{seat_id}', [AdminController::class, 'oneSeat'])->name('seats.one');

                Route::get('/bookings', [AdminController::class, 'allBookings'])->name('bookings.all');
                Route::get('/bookings/{booking_id}', [AdminController::class, ' oneBooking'])->name('bookings.one');
            }
        );
    }
);

require __DIR__ . '/auth.php';
