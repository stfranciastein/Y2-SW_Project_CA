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
                'name' => 'One Small Step',
                'description' => 'Complete your first activity',
                'points_required' => 1,
                'category' => 'general',
                'image_url' => null,
            ],
            [
                'name' => 'Bottoms Up',
                'description' => 'Completed 1 food activity',
                'points_required' => 1,
                'category' => 'food',
                'image_url' => null,
            ],
            [
                'name' => 'Waste not, want not',
                'description' => 'Completed 1 wasted activity',
                'points_required' => 1,
                'category' => 'waste',
                'image_url' => null,
            ],
            [
                'name' => 'Pikachu, I choose you',
                'description' => 'Completed 1 energy activity',
                'points_required' => 1,
                'category' => 'energy',
                'image_url' => null,
            ],
            [
                'name' => 'Terra Firma',
                'description' => 'Completed 1 land activity',
                'points_required' => 1,
                'category' => 'land',
                'image_url' => null,
            ],
            [
                'name' => 'I am one with the wind and sky',
                'description' => 'Completed 1 air activity',
                'points_required' => 1,
                'category' => 'air',
                'image_url' => null,
            ],
            [
                'name' => 'Call me Ishmael',
                'description' => 'Completed 1 sea activity',
                'points_required' => 1,
                'category' => 'sea',
                'image_url' => null,
            ],
            [
                'name' => 'I\'ve got a lot on my mind',
                'description' => 'Complete 5 activities',
                'points_required' => 5,
                'category' => 'general',
                'image_url' => null,
            ],
            [
                'name' => 'Master of all Four Elements',
                'description' => 'Completed one of each activity type',
                'points_required' => 6,
                'category' => 'general',
                'image_url' => null,
            ],
            [
                'name' => 'And well, in it',
                'description' => 'Complete 10 activities',
                'points_required' => 10,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'These boots have seen everything',
                'description' => 'Complete 15 activities',
                'points_required' => 15,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'Still me, despite everything',
                'description' => 'Complete 20 activities',
                'points_required' => 20,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'I wish I had a bag of holding',
                'description' => 'Complete 25 activities',
                'points_required' => 25,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'Nothing important is ever easy',
                'description' => 'Complete 30 activities',
                'points_required' => 30,
                'category' => 'general',
                'image_url' => null,   
            ],
        ]);
    }
}
