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
                'description' => 'You\'ve completed your first activity. Congratulations!',
                'points_required' => 1,
                'category' => 'general',
                'image_url' => null,
            ],
            [
                'name' => 'Bottoms Up',
                'description' => 'Completed 1 activity to reduce your food emissions.',
                'points_required' => 1,
                'category' => 'food',
                'image_url' => null,
            ],
            [
                'name' => 'Waste not, want not',
                'description' => 'Completed 1 activity to reduce your waste emissions.',
                'points_required' => 1,
                'category' => 'waste',
                'image_url' => null,
            ],
            [
                'name' => 'Pikachu, I choose you',
                'description' => 'Completed 1 activity to reduce your energy emissions.',
                'points_required' => 1,
                'category' => 'energy',
                'image_url' => null,
            ],
            [
                'name' => 'Terra Firma',
                'description' => 'Completed 1 activity to reduce your land emissions.',
                'points_required' => 1,
                'category' => 'land',
                'image_url' => null,
            ],
            [
                'name' => 'I am one with the wind and sky',
                'description' => 'Completed 1 activity to reduce your air emissions.',
                'points_required' => 1,
                'category' => 'air',
                'image_url' => null,
            ],
            [
                'name' => 'Call me Ishmael',
                'description' => 'Completed 1 activity to reduce your water emissions.',
                'points_required' => 1,
                'category' => 'sea',
                'image_url' => null,
            ],
            [
                'name' => 'I\'ve got a lot on my mind',
                'description' => 'You\'ve completed 5 activities. Congratulations!',
                'points_required' => 5,
                'category' => 'general',
                'image_url' => null,
            ],
            [
                'name' => 'Master of all Four Elements',
                'description' => 'Completed one of each activity type. Keep up the good work!',
                'points_required' => 6,
                'category' => 'general',
                'image_url' => null,
            ],
            [
                'name' => 'And well, in it',
                'description' => 'Completed a total of 10 activities.',
                'points_required' => 10,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'These boots have seen everything',
                'description' => 'Completed a total of 15 activities',
                'points_required' => 15,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'Still me, despite everything',
                'description' => 'Completed a total of 20 activities',
                'points_required' => 20,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'I wish I had a bag of holding',
                'description' => 'Completed a total of 25 activities',
                'points_required' => 25,
                'category' => 'general',
                'image_url' => null,   
            ],
            [
                'name' => 'Nothing important is ever easy',
                'description' => 'Completed a total of 30 activities',
                'points_required' => 30,
                'category' => 'general',
                'image_url' => null,   
            ],
        ]);
    }
}
