<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserEmission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Gale Dekarios',
            'email' => 'wizardofwaterdeep@gmail.com',
            'password' => Hash::make('123456789'),
            'country' => 'USA',
            'biography' => 'A process known as ceremorphosis?! It is to be avoided.',
            'image_url' => null,
            'level' => 1,
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'onboarded' => true
        ]);

        UserEmission::create([
            'user_id' => 1,
            'baseline_food' => 800, // A few times a week (800 kg CO2/year)
            'baseline_waste' => 200, // Sometimes (200 kg CO2/year)
            'baseline_energy' => 750, // Moderate usage (750 kg CO2/year)
            'baseline_land' => 450, // Rarely (450 kg CO2/year)
            'baseline_air' => 500, // 2-5 flights (500 kg CO2/year)
            'baseline_sea' => 300, // Sometimes (300 kg CO2/year)
        ]);
        

        // Uncomment if you want 10 random users
        // User::factory(10)->create();
        $this->call(ActivitySeeder::class);
    }
}
