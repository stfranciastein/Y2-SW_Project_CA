<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppPost;
use App\Models\User;

class AppPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $posts = [
            [
                'title' => 'Climate Action Hits Milestone',
                'description' => 'Global emissions saw a 5% drop in 2024.',
                'content' => 'In an encouraging report, climate scientists have observed a measurable drop in CO2 output, largely due to changes in transport and energy.',
                'category' => 'news',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'New Recycling Laws Announced',
                'description' => 'Government pushes for stricter recycling rules by 2026.',
                'content' => 'The Ministry for the Environment has proposed a new bill that will enforce mandatory household recycling across the country.',
                'category' => 'news',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Study Reveals Impact of Meat Consumption',
                'description' => 'New findings show dietary choices affect climate.',
                'content' => 'A new study published in Nature Sustainability reveals that reducing meat intake can drastically lower an individual\'s carbon footprint.',
                'category' => 'news',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'EU to Ban Single-Use Plastics',
                'description' => 'Policy to phase out plastics by 2030.',
                'content' => 'The European Union has outlined plans to eliminate single-use plastic packaging and utensils from circulation within the next five years.',
                'category' => 'news',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Public Transport Use Hits Record High',
                'description' => 'Cities report increase in bus and train usage.',
                'content' => 'As part of green initiatives, several major cities are now reporting record numbers of commuters switching to public transport.',
                'category' => 'news',
                'image_url' => null,
                'user_id' => $user->id
            ]
        ];

        foreach ($posts as $post) {
            AppPost::create($post);
        }
    }
}
