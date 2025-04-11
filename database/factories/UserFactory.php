<?php

namespace Database\Factories;

// database/factories/UserFactory.php

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        $countries = ['Ireland', 'England', 'Wales', 'Scotland', 'United States of America'];
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'country' => $this->faker->randomElement($countries),
            'biography' => $this->faker->sentence(8),
            'image_url' => null,
            'level' => rand(1, 5),
            'role' => 'user',
            'onboarded' => true,
        ];
    }
}

