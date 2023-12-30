<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use App\Models\Coach;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = Trip::all();

        foreach($trips as $trip) {
            $coaches = Coach::where('trip_id', $trip->id)->get();

            foreach($coaches as $coach) {
                $total_seats = ($coach->class === 'economy') ? 50 : 25;

                for ($i = 1; $i <= $total_seats; $i++) {
                    Seat::create([
                        'seat_number' => $i,
                        'trid_id' => $trip->id,
                        'coach_id' => $coach->id,
                        'status' => 'available,'
                    ]);
                }
            }

        }
        //
    }
}
