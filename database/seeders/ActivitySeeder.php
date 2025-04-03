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
                'reduction_land' => 150,  
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'land',
            ],
            [
                'name' => 'Go Meat-Free for a Week',
                'description' => 'Reduce your carbon footprint by avoiding meat for seven days.',
                'difficulty' => 'Medium',
                'impact_points' => 30,
                'image_url' => null,
                'reduction_food' => 50,  
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'food',
            ],
            [
                'name' => 'Install LED Light Bulbs',
                'description' => 'Swap old bulbs for energy-efficient LED lighting throughout your home.',
                'difficulty' => 'Easy',
                'impact_points' => 15,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 50,  
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'energy',
            ],
            [
                'name' => 'Recycle All Household Waste This Week',
                'description' => 'Make sure to recycle paper, plastic, and metal instead of sending them to landfill.',
                'difficulty' => 'Easy',
                'impact_points' => 10,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 50,  
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'waste',
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
                'reduction_air' => 200,  
                'reduction_sea' => 0,
                'category' => 'air',
            ],
            [
                'name' => 'Switch to a Green Energy Supplier',
                'description' => 'Reduce your carbon footprint by switching to a renewable energy supplier.',
                'difficulty' => 'Medium',
                'impact_points' => 40,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 100,  
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'energy',
            ],
            [
                'name' => 'Use a Clothesline Instead of a Dryer',
                'description' => 'Save energy by air-drying your clothes instead of using a tumble dryer.',
                'difficulty' => 'Easy',
                'impact_points' => 10,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 50,  
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'energy',
            ],
            [
                'name' => 'Switch to a Plant-Based Milk',
                'description' => 'Reduce your environmental impact by switching to plant-based milk alternatives.',
                'difficulty' => 'Medium',
                'impact_points' => 20,
                'image_url' => null,
                'reduction_food' => 100,  
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'food',
            ],
            [
                'name' => 'Plant Trees in Your Community',
                'description' => 'Help absorb CO2 by planting trees in your local area.',
                'difficulty' => 'Hard',
                'impact_points' => 60,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 300,  
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'land',
            ],
            [
                'name' => 'Buy Locally Grown Produce',
                'description' => 'Support local farms and reduce emissions from food transport.',
                'difficulty' => 'Easy',
                'impact_points' => 25,
                'image_url' => null,
                'reduction_food' => 100,  
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'food',
            ],
            [
                'name' => 'Compost Your Organic Waste',
                'description' => 'Turn food scraps and organic waste into compost to reduce landfill emissions.',
                'difficulty' => 'Medium',
                'impact_points' => 30,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 150,  
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'waste',
            ],
            [
                'name' => 'Install a Smart Thermostat',
                'description' => 'Control your home temperature more efficiently to save energy.',
                'difficulty' => 'Medium',
                'impact_points' => 40,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 150,  
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'energy',
            ],
            [
                'name' => 'Reduce Single-Use Plastic Usage',
                'description' => 'Minimize your use of plastic products and packaging.',
                'difficulty' => 'Medium',
                'impact_points' => 20,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 250,  
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'waste',
            ],
            [
                'name' => 'Reduce Plastic Use Near Water',
                'description' => 'Avoid single-use plastics and properly dispose of waste to protect marine ecosystems.',
                'difficulty' => 'Medium',
                'impact_points' => 40,
                'image_url' => null,
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 150,
                'category' => 'sea',
            ],            
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
