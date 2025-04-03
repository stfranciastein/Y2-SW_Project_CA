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
            'country' => 'Ireland',
            'biography' => 'A process known as ceremorphosis?! It is to be avoided.',
            'image_url' => 'profile_pictures/admin.png',
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

        // Create 10 users
        $countries = ['Ireland', 'England', 'Wales', 'Scotland', 'United States of America'];

        $users = [
            ['name' => 'John O\'Connor', 'email' => 'john@irish.com', 'biography' => 'An environmental enthusiast living in Dublin.'],
            ['name' => 'Sinead Murphy', 'email' => 'sinead@irish.com', 'biography' => 'Passionate about sustainability and clean energy.'],
            ['name' => 'Ciaran Byrne', 'email' => 'ciaran@irish.com', 'biography' => 'Hiking and reducing my carbon footprint every day.'],
            ['name' => 'Aoife Kelly', 'email' => 'aoife@irish.com', 'biography' => 'Enjoys organic farming and green living.'],
            ['name' => 'Niamh Gallagher', 'email' => 'niamh@irish.com', 'biography' => 'Working towards a zero-waste lifestyle.'],
            ['name' => 'Sean O\'Neill', 'email' => 'sean@irish.com', 'biography' => 'Avid cyclist and advocate for public transport.'],
            ['name' => 'Fiona Hughes', 'email' => 'fiona@irish.com', 'biography' => 'Loves to travel sustainably and promote eco-friendly practices.'],
            ['name' => 'James McCarthy', 'email' => 'james@irish.com', 'biography' => 'Focusing on reducing my energy consumption and waste.'],
            ['name' => 'Eimear Walsh', 'email' => 'eimear@irish.com', 'biography' => 'Caring for the environment, one small change at a time.'],
            ['name' => 'Liam Fitzpatrick', 'email' => 'liam@irish.com', 'biography' => 'Proud to be reducing my environmental impact every day.']
        ];

        foreach ($users as $userData) {
            // Create the user
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password123'),
                'country' => $countries[array_rand($countries)],
                'biography' => $userData['biography'],
                'image_url' => null,
                'level' => 1,
                'role' => 'user', // Regular user role
                'remember_token' => Str::random(10),
                'onboarded' => true
            ]);

            // Create user emissions
            UserEmission::create([
                'user_id' => $user->id,
                'baseline_food' => rand(300, 1200), 
                'baseline_waste' => rand(100, 500), 
                'baseline_energy' => rand(400, 1000), 
                'baseline_land' => rand(200, 600),
                'baseline_air' => rand(100, 1000),
                'baseline_sea' => rand(100, 500),
            ]);
        }
        

        // Uncomment if you want 10 random users
        // User::factory(10)->create();
        $this->call(ActivitySeeder::class);
        $this->call(AppPostSeeder::class);
        $this->call(AchievementSeeder::class);

    }
}
