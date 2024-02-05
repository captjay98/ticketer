<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;
// use App\Models\Ticket;
use App\Models\TicketType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seat' => $this->faker->numberBetween($int1 = 1, $int2 = 20),
            'serial_number' => $this->faker->uuid(),
            'expires_at' => $this->faker->dateTime(),
            'trip_id' => Trip::inRandomOrder()->id(),
            'ticket_type_id' => function ($seat_class, $price) {
                return TicketType::Factory()->create(
                    [
                        'seat_class' => $seat_class,
                        'price' => $price
                    ]
                )->id;
            },
        ];
    }
}
