<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::insert([
            [
                'description' => 'Complete your first activity',
                'points_required' => 1,
                'category' => 'general',
                'image_url' => null,
            ],
            [
                'description' => 'Complete 10 activities',
                'points_required' => 10,
                'category' => 'general',
                'image_url' => null,
            ],
        ]);
    }
}
