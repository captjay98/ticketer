<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use App\Models\Coach;
use App\Models\Seat;
use App\Events\TripCreated;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $trips = [


            #KADUNA-ABUJA
            [
                'title' => 'KD_ABJ',
                'source' => 'Kaduna',
                'destination' => 'Abuja',
                'date' => '2024-06-20',
                'departure_time' => '8:30:00',
                'arrival_time' => '11:00:00',
            ],
            #ABUJA-KADUNA
            [
                'title' => 'ABJ_KD',
                'source' => 'Abuja',
                'destination' => 'Kaduna',
                'date' => '2024-07-20',
                'departure_time' => '13:30:00',
                'arrival_time' => '16:00:00',
            ],
            #Lagos-Ibadan
            [
                'title' => 'LAG_IBD',
                'source' => 'Lagos',
                'destination' => 'Ibadan',
                'date' => '2024-06-21',
                'departure_time' => '10:30:00',
                'arrival_time' => '13:00:00',
            ],
            #Ibadan-Lagos
            [
                'title' => 'IBD_LAG',
                'source' => 'Ibadan',
                'destination' => 'Lagos',
                'date' => '2024-07-21',
                'departure_time' => '15:30:00',
                'arrival_time' => '18:00:00',
            ],
            #Warri-Ibadan
            [
                'title' => 'WAR_IBD',
                'source' => 'Warri',
                'destination' => 'Ibadan',
                'date' => '2024-06-21',
                'departure_time' => '8:00:00',
                'arrival_time' => '10:30:00',
            ],
            #Ibadan-Warri
            [
                'title' => 'IBD_WAR',
                'source' => 'Ibadan',
                'destination' => 'Warri',
                'date' => '2024-07-21',
                'departure_time' => '13:30:00',
                'arrival_time' => '16:00:00',
            ],
            #KANO-KADUNA
            [
                'title' => 'KN_KD',
                'source' => 'Kano',
                'destination' => 'Kaduna',
                'date' => '2024-06-21',
                'departure_time' => '8:30:00',
                'arrival_time' => '11:00:00',
            ],
            #Kaduna-Kano
            [
                'title' => 'KD_KN',
                'source' => 'Kaduna',
                'destination' => 'Kano',
                'date' => '2024-07-21',
                'departure_time' => '14:00:00',
                'arrival_time' => '16:30:00',
            ],
            #Kano-Abj
            [
                'title' => 'KN_ABJ',
                'source' => 'Kano',
                'destination' => 'Abuja',
                'date' => '2024-06-21',
                'departure_time' => '8:30:00',
                'arrival_time' => '06:30:00',
            ],
            #Abj-Kano
            [
                'title' => 'ABJ_KN',
                'source' => 'Abuja',
                'destination' => 'Kano',
                'date' => '2024-07-21',
                'departure_time' => '13:30:00',
                'arrival_time' => '17:30:00',
            ],
            #Warri-Lagos
            [
                'title' => 'WAR_LAG',
                'source' => 'Warri',
                'destination' => 'Lagos',
                'date' => '2024-06-21',
                'departure_time' => '8:00:00',
                'arrival_time' => '06:00:00',
            ],
            #Lagos-Warri
            [
                'title' => 'LAG_WAR',
                'source' => 'Lagos',
                'destination' => 'Warri',
                'date' => '2024-07-21',
                'departure_time' => '13:00:00',
                'arrival_time' => '17:00:00',
            ],

        ];

        // dd($trips);
        foreach ($trips as $trip) {

            $trip = Trip::Factory()->create($trip);
            $coaches = Coach::all();

            foreach ($coaches as $coach) {
                $coachId = $coach['id'];
                $trip->coaches()->attach($coachId);
            }

            event(new TripCreated($trip));
        }
    }
}


// $trips = [
//           #KADUNA-ABUJA
//                   [
//                       'title' => 'KD-ABJ',
//                       'source' => 'Kaduna',
//                       'destination' => 'Abuja',
//                       'date' => '2024-06-20',
//                       'departure_time' => '8:30:00',
//                       'arrival_time' => '11:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #ABUJA-KADUNA
//        [
//                       'title' => 'ABJ-KD',
//                       'source' => 'Abuja',
//                       'destination' => 'Kaduna',
//                       'date' => '2024-06-20',
//                       'departure_time' => '13:30:00',
//                       'arrival_time' => '16:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Lagos-Ibadan
//                   [
//                       'title' => 'LAG-IBD',
//                       'source' => 'Lagos',
//                       'destination' => 'Ibadan',
//                       'date' => '2024-06-21',
//                       'departure_time' => '10:30:00',
//                       'arrival_time' => '13:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Ibadan-Lagos
//        [
//                       'title' => 'IBD-LAG',
//                       'source' => 'Ibadan',
//                       'destination' => 'Lagos',
//                       'date' => '2024-06-21',
//                       'departure_time' => '15:30:00',
//                       'arrival_time' => '18:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Warri-Ibadan
//        [
//                       'title' => 'WAR-IBD',
//                       'source' => 'Warri',
//                       'destination' => 'Ibadan',
//                       'date' => '2024-06-21',
//                       'departure_time' => '8:00:00',
//                       'arrival_time' => '10:30:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Ibadan-Warri
//        [
//                       'title' => 'IBD-WAR',
//                       'source' => 'Ibadan',
//                       'destination' => 'Warri',
//                       'date' => '2024-06-21',
//                       'departure_time' => '13:30:00',
//                       'arrival_time' => '16:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #KANO-KADUNA
//        [
//                       'title' => 'KN-KD',
//                       'source' => 'Kano',
//                       'destination' => 'Kaduna',
//                       'date' => '2024-06-21',
//                       'departure_time' => '8:30:00',
//                       'arrival_time' => '11:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Kaduna-Kano
//        [
//                       'title' => 'KD-KN',
//                       'source' => 'Kaduna',
//                       'destination' => 'Kano',
//                       'date' => '2024-06-21',
//                       'departure_time' => '14:00:00',
//                       'arrival_time' => '16:30:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Kano-Abj
//        [
//                       'title' => 'KANO-ABJ',
//                       'source' => 'Kano',
//                       'destination' => 'Abuja',
//                       'date' => '2024-06-21',
//                       'departure_time' => '8:30:00',
//                       'arrival_time' => '06:30:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Abj-Kano
//        [
//                       'title' => 'ABJ-KANO',
//                       'source' => 'Kano',
//                       'destination' => 'Abuja',
//                       'date' => '2024-06-21',
//                       'departure_time' => '13:30:00',
//                       'arrival_time' => '17:30:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//           #Warri-Lagos
//        [
//                       'title' => 'WAR-LAG',
//                       'source' => 'Warri',
//                       'destination' => 'Lagos',
//                       'date' => '2024-06-21',
//                       'departure_time' => '8:00:00',
//                       'arrival_time' => '06:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],
//            #Lagos-Warri
//        [
//                       'title' => 'LAG-WAR',
//                       'source' => 'Lagos',
//                       'destination' => 'Warri',
//                       'date' => '2024-06-21',
//                       'departure_time' => '13:00:00',
//                       'arrival_time' => '17:00:00',
//                       'coaches' =>  Coach::inRandomOrder()->id(),
//                       // 'seats' => '',
//                   ],

//        ];
