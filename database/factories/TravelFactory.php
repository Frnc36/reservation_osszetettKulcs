<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\User;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelFactory extends Factory
{
    protected $model = Travel::class;

    public function definition(): array
    {
        do {
            $userId = User::inRandomOrder()->first()->id;
            $flightId = Flight::inRandomOrder()->first()->id;

            // Ellenőrizzük, hogy ez a kombináció létezik-e már
            $exists = Travel::where('user_id', $userId)
                ->where('flight_id', $flightId)
                ->exists();
        } while ($exists); // Addig ismétli, amíg egyedi párt nem talál

        return [
            'flight_id' => $flightId,
            'user_id' => $userId,
            'evaluation' => fake()->sentence(),
        ];
    }
}
