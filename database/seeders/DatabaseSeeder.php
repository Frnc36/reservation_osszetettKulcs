<?php

namespace Database\Seeders;

use App\Models\Airline;
use App\Models\Flight;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Létrehozzuk az alap adatokat a factory-kal
        User::factory(10)->create();
        Airline::factory(5)->create();
        Flight::factory(10)->create();

        // 2. A travel táblát pedig így töltjük fel biztonságosan, duplikáció nélkül:
        $users = User::all();
        $flights = Flight::all();

        foreach ($users as $user) {
            // Minden felhasználóhoz véletlenszerűen kiválasztunk 1 vagy 2 járatot, 
            // de a PHP-s random() metódus ebben a kontextusban nem ismétel egyen belül
            $selectedFlights = $flights->random(rand(1, 2));

            foreach ($selectedFlights as $flight) {
                \App\Models\Travel::create([
                    'flight_id' => $flight->id,
                    'user_id' => $user->id,
                    'evaluation' => fake()->sentence(),
                ]);
            }
        }

        /*         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
