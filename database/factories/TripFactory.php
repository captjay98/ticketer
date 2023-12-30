<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Coach;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return[];
    }
}


// return [

//     'title' => $this->faker->randomElement([]),
//     'source' => $this->faker->randomElement([]),
//     'destination' => $this->faker->randomElement([]),
//     'seats' => '0',
//     'date' => $this->faker->date(),
//     'departure_time' => $this->faker->time(),
//     'arrival_time' => $this->faker->time(),
// ];
