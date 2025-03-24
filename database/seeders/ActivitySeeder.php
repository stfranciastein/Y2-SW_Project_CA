<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'name' => 'Take Public Transport Instead of Driving',
                'description' => 'Use the bus or train to reduce your carbon emissions from daily commuting.',
                'difficulty' => 'Easy',
                'impact_points' => 20,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 10,
                'reduction_air' => 0,
                'reduction_sea' => 0,
            ],
            [
                'name' => 'Go Meat-Free for a Week',
                'description' => 'Reduce your carbon footprint by avoiding meat for seven days.',
                'difficulty' => 'Medium',
                'impact_points' => 30,
                'image_url' => null,
                'reduction_food' => 15,
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
            ],
            [
                'name' => 'Install LED Light Bulbs',
                'description' => 'Swap old bulbs for energy-efficient LED lighting throughout your home.',
                'difficulty' => 'Easy',
                'impact_points' => 15,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 10,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
            ],
            [
                'name' => 'Recycle All Household Waste This Week',
                'description' => 'Make sure to recycle paper, plastic, and metal instead of sending them to landfill.',
                'difficulty' => 'Easy',
                'impact_points' => 10,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 10,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
            ],
            [
                'name' => 'Avoid a Flight for Your Next Trip',
                'description' => 'Choose a local vacation spot or take the train to avoid air travel emissions.',
                'difficulty' => 'Hard',
                'impact_points' => 50,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 20,
                'reduction_sea' => 0,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
