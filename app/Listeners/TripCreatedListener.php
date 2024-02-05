<?php

namespace App\Listeners;

use App\Events\TripCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Seat;
use App\Models\TicketType;

class TripCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

        //
    }

    /**
     * Handle the event.
     */
    public function handle(TripCreated $event): void
    {
        $trip = $event->trip;

        $coaches = $trip->coaches;

        $ticket_types = [
            'KD_ABJ' => ['Economy' => 4000, 'Business' => 7000,],
            'ABJ_KD' => ['Economy' => 4000, 'Business' => 7000,],
            'LAG_IBD' => ['Economy' => 5000, 'Business' => 9000,],
            'IBD_LAG' => ['Economy' => 5000, 'Business' => 9000,],
            'WAR_IBD' => ['Economy' => 5000, 'Business' => 10000,],
            'IBD_WAR' => ['Economy' => 5000, 'Business' => 10000,],
            'KN_KD' => ['Economy' => 4500, 'Business' => 7500,],
            'KD_KN' => ['Economy' => 4500, 'Business' => 7500,],
            'KN_ABJ' => ['Economy' => 5000, 'Business' => 9000,],
            'ABJ_KN' => ['Economy' => 5000, 'Business' => 9000,],
            'WAR_LAG' => ['Economy' => 6000, 'Business' => 9000,],
            'LAG_WAR' => ['Economy' => 6000, 'Business' => 9000,],
        ];


        foreach ($coaches as $coach) {
            $totalseats = ($coach->coach_class === 'Economy') ? 54 : 28;
            for ($i = 1; $i <= $totalseats; $i++) {
                Seat::create([
                    'seat_number' => $i,
                    'trip_id' => $trip->id,
                    'coach_id' => $coach->id,
                    'status' => 'available'
                ]);
            }
        }

        foreach ($ticket_types[$trip->title] as $class => $price) {
            TicketType::create([
                'price' => $price,
                'seat_class' => $class,
                'trip_id' => $trip->id,
            ]);
        }
    }
}
