<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketType>
 */
class TicketTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        if ($trip->title === 'KD-ABJ') {
            return [
                [
                 'price' => 4000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 7000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };

        if ($trip->title === 'ABJ-KD') {

            return [
                [
                 'price' => 4000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 7000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };


        if ($trip->title === 'LAG-IBD') {
            return [
                [
                 'price' => 5000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 9000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };


        if ($trip->title === 'IBD-LAG') {
            return [
                [
                 'price' => 5000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 9000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };



        if ($trip->title === 'WAR-IBD') {
            return [
                [
                 'price' => 5000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 10000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };


        if ($trip->title === 'IBD-WAR') {
            return [
                [
                 'price' => 5000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 10000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };

        if ($trip->title === 'KN-KD') {
            return [
                [
                 'price' => 4500,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 7500,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };



        if ($trip->title === 'KD-KN') {
            return [
                [
                 'price' => 4500,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 7500,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };



        if ($trip->title === 'KANO-ABJ') {
            return [
                [
                 'price' => 5000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 9000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };



        if ($trip->title === 'ABJ-KN') {
            return [
                [
                 'price' => 5000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 9000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };


        if ($trip->title === 'WAR-LAG') {
            return [
                [
                 'price' => 6000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 9000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };


        if ($trip->title === 'LAG-WAR') {

            return [
                [
                 'price' => 6000,
                 'seat_class' => 'economy',
                 'trip_id' => $trip->id,
                ],
                [
                 'price' => 9000,
                 'seat_class' => 'Business',
                 'trip_id' => $trip->id,
                ]
            ];
        };





        // return [
        //            'seat_class' => $this->faker->name(),
        //            'price' =>  $this->faker->name(),
        //        ];
    }
}
