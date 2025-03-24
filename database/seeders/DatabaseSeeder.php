<?php

namespace Database\Seeders;

use App\Models\User;
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

        // Uncomment if you want 10 random users
        // User::factory(10)->create();
        $this->call(ActivitySeeder::class);
    }
}
