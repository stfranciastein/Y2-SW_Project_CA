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
                'title' => 'With the Great Mussel Die-Off, Scientists Scramble for Answers',
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
            ],
            [
                'title' => 'Green Future Expo 2025',
                'description' => 'Join innovators and climate advocates at Europe’s largest sustainability expo.',
                'content' => 'This year’s Green Future Expo will feature over 300 speakers, workshops, and startups focused on climate tech and circular economy solutions.',
                'category' => 'event',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'National Tree Planting Day',
                'description' => 'Volunteers across the country will plant 1 million trees.',
                'content' => 'On April 22, citizens are encouraged to join regional efforts to reforest degraded land and urban spaces.',
                'category' => 'event',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Coastal Cleanup Weekend',
                'description' => 'Organized shoreline cleanups happening nationwide.',
                'content' => 'From May 18–19, dozens of environmental groups will lead local efforts to collect plastic waste along beaches and riverbanks.',
                'category' => 'event',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Low-Carbon Commuter Challenge',
                'description' => 'Cycle, walk, or take transit for a week and win prizes.',
                'content' => 'Participants who track their low-carbon commutes from June 3–9 can earn entries into a raffle for eco-friendly gear and gift cards.',
                'category' => 'event',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Youth Climate Leadership Summit',
                'description' => 'A three-day event for young environmental leaders.',
                'content' => 'Hosted in Amsterdam, this summit connects student activists and youth organizers for training, collaboration, and action planning.',
                'category' => 'event',
                'image_url' => null,
                'user_id' => $user->id
            ],
        
            // Announcements
            [
                'title' => 'New App Update: CO₂ Tracker Released',
                'description' => 'Monitor your footprint in real-time with new features.',
                'content' => 'The latest Planit app version introduces a live carbon tracker, daily goals, and syncing with your transport and food apps.',
                'category' => 'announcement',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Expanded Support for Schools',
                'description' => 'Planit now partners with over 200 educational institutions.',
                'content' => 'We’re proud to announce new partnerships with universities and secondary schools to bring climate education to classrooms.',
                'category' => 'announcement',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Carbon Offsets Now Available In-App',
                'description' => 'Offset your emissions directly through your dashboard.',
                'content' => 'You can now fund certified reforestation and renewable energy projects directly from your Planit profile.',
                'category' => 'announcement',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Planit Joins UN Climate Pact',
                'description' => 'We’re now an official signatory to the UN Race to Zero.',
                'content' => 'As part of our commitment to net-zero operations, Planit has joined a global pact of companies pushing for ambitious climate goals.',
                'category' => 'announcement',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'New Regional Moderators Appointed',
                'description' => 'Welcome our community leaders across 5 new regions.',
                'content' => 'To support local action, we’ve appointed moderators in Ireland, Germany, Kenya, Chile, and Vietnam. They’ll help highlight stories and organize events.',
                'category' => 'announcement',
                'image_url' => null,
                'user_id' => $user->id
            ],
            [
                'title' => 'Planit Now Available in 6 New Languages',
                'description' => 'Improving accessibility across global regions.',
                'content' => 'We’re excited to announce multilingual support including Spanish, French, German, Hindi, Swahili, and Tagalog in the latest update.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Custom Emissions Goals Are Here',
                'description' => 'Set your own monthly carbon targets.',
                'content' => 'Users can now define personalized CO₂ targets and receive nudges and tracking to help stay on track.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Team Challenges Now Live',
                'description' => 'Form a team and compete for lower emissions.',
                'content' => 'Workplaces, schools, and communities can create teams to reduce their footprint together and unlock collaborative rewards.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'New Dashboard Widgets Released',
                'description' => 'More visual insights into your progress.',
                'content' => 'See your CO₂ breakdown by category, view monthly summaries, and track improvement with new dashboard widgets.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Carbon Badge System Updated',
                'description' => 'Earn new badges for eco milestones.',
                'content' => 'Our gamified badge system now includes 15+ new achievements for sustainable actions and long-term reductions.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Expanded Local Events Calendar',
                'description' => 'Find events and initiatives near you.',
                'content' => 'The new “Local” tab in your dashboard shows verified environmental events, meetups, and workshops in your area.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Planit Reaches 1 Million Users',
                'description' => 'Thank you for being part of the change.',
                'content' => 'We’re celebrating a huge milestone this month with over 1 million registered users worldwide and growing.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Dark Mode Is Now Available',
                'description' => 'Your eyes and battery will thank you.',
                'content' => 'By popular demand, dark mode is now live across all Planit platforms. Toggle it in settings.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Sustainability Podcast Launching Soon',
                'description' => 'Stories from climate champions around the globe.',
                'content' => 'The Planit team is launching a new podcast featuring conversations with changemakers and innovators in sustainability.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'New Carbon Literacy Mini-Course',
                'description' => 'Learn the basics of your footprint in 10 minutes.',
                'content' => 'A bite-sized interactive course is now available to help users understand the fundamentals of carbon footprints and sustainable habits.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ]

        ];

        foreach ($posts as $post) {
            AppPost::create($post);
        }
    }
}
