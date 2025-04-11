<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserEmissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // This creates a user if one isn't passed in
            'baseline_food' => $this->faker->numberBetween(300, 1200),
            'baseline_waste' => $this->faker->numberBetween(100, 500),
            'baseline_energy' => $this->faker->numberBetween(400, 1000),
            'baseline_land' => $this->faker->numberBetween(200, 600),
            'baseline_air' => $this->faker->numberBetween(100, 1000),
            'baseline_sea' => $this->faker->numberBetween(100, 500),
        ];
    }
}
