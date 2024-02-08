<?php

namespace Database\Seeders;

use App\Models\Coach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Coach::Factory()->create();


        $coaches = [
            [
                'coach_name' => "ECO10",
                'coach_class' => "Economy",
                'capacity' => "50",
                'is_active' => true,
            ],
            [
                'coach_name' => "ECO20",
                'coach_class' => "Economy",
                'capacity' => "50",
                'is_active' => true,
            ],
            [
                'coach_name' => "ECO30",
                'coach_class' => "Economy",
                'capacity' => "50",
                'is_active' => true,
            ],
            [
                'coach_name' => "ECO40",
                'coach_class' => "Economy",
                'capacity' => "50",
                'is_active' => true,
            ],
            [
                'coach_name' => "ECO50",
                'coach_class' => "Economy",
                'capacity' => "50",
                'is_active' => true,
            ],
            [
                'coach_name' => "ECO60",
                'coach_class' => "Economy",
                'capacity' => "50",
                'is_active' => true,
            ],
            [
                'coach_name' => "ECO70",
                'coach_class' => "Economy",
                'capacity' => "50",
                'is_active' => true,
            ],
            [
                'coach_name' => "BUS80",
                'coach_class' => "Business",
                'capacity' => "25",
                'is_active' => true,
            ],
            [
                'coach_name' => "BUS90",
                'coach_class' => "Business",
                'capacity' => "25",
                'is_active' => true,
            ],
            [
                'coach_name' => "BUS100",
                'coach_class' => "Business",
                'capacity' => "25",
                'is_active' => true,
            ],


        ];

        foreach ($coaches  as $coach) {
            Coach::Factory()->create($coach);
        };

        //
    }
}
