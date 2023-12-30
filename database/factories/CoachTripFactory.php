<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;
use App\Models\Coach;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach_Trip>
 */
class CoachTripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // dd(Trip::Factory()->create()->id);

        return [
            'trip_id' => Trip::Factory()->create()->id,

            // 'coach_id' => Coach::get(),
            //
        ];
    }
}

// function () {foreach(Trip::Factory()->create() as $trip) {return $trip->id;};},

// foreach(Trip::Factory()->create() as $trip){return $trip->id;}
