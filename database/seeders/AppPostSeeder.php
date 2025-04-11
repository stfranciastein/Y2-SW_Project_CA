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
                'description' => 'One of the most endangered animals in the world, freshwater mussels are threatened by pollution, climate change, habitat loss, and invasive species. But in the epicenter of their diversity — the Southeastern U.S. — the root cause of a catastrophic die-off remains a mystery.',
                'content' => 'Throughout his professional life, U.S. Forest Service researcher Wendell Haag has studied freshwater mussels in their hotspot of biological diversity, which extends across a vast swath of the southeastern United States. His more than 30-year career has been overshadowed by a single question: Why are the bivalves in this region disappearing? Freshwater mussels are one of the most endangered groups of animals in the world. North America is currently home to more than 300 native species — many with colorful colloquial names like fuzzy pigtoe, purple warty back, fluted elephant ear, orangefoot pimpleback, pink heelsplitter, and monkeyface — of which 70 percent are either endangered, threatened, or of special concern. Some southeastern watersheds have seen losses of a third to half of their mussel species in the last half century; another 21 southeastern species are believed to be extinct, and dozens more persist only in fragments of their former range. Threats to mussels come from many quarters — polluted runoff, the damming of waterways, warming water temperatures, pathogenic viruses, and invasive competitors — but an explanation for the extent of the U.S.’s most widespread die-off, which began decades ago in the Southeast, has remained out of reach.', 
                'category' => 'news',
                'image_url' => 'https://yale-threesixty.transforms.svdcdn.com/production/Mussel-Mortality_USFWS-HEADER.jpeg?w=1000&h=562&auto=compress%2Cformat&fit=crop&dm=1743786236&s=18f1495dc30e036e585d0c9ab7d893e2',
                'user_id' => $user->id
            ],
            [
                'title' => 'With NOAA Cuts, a Proud Legacy and Vital Science Are at Risk',
                'description' => 'For more than 50 years, NOAA has pioneered climate research and been instrumental in advancing modern weather forecasting. Now labeled by Project 2025 as part of the “climate alarm industry” and facing DOGE-driven cuts, the future of this valuable public asset is in jeopardy',
                'content' => 'A couple of weeks ago, an extremely bright and capable young scientist I know was terminated from her job at NOAA’s Geophysical Fluid Dynamics Laboratory (GFDL), in Princeton, New Jersey. I had met her around five years ago, when she was a graduate student, and stayed in touch with her through her subsequent postdoctoral appointment. She had started at GFDL last fall and was on probationary status as a new federal employee. Ten scientists with that status were fired from GFDL that day, part of around a thousand let go from NOAA altogether. NOAA has since been instructed by the Trump administration to fire another thousand as part of a “reduction in force,” the two rounds together totaling around twenty percent of NOAA’s personnel. It’s not clear if it will stop there. Every scientist in the world who studies the atmosphere or ocean knows the name of GFDL, and most likely the names of some of its scientists, past or present. Syukuro Manabe, who won the Nobel Prize in physics in 2021 for developing some of the first and most elegant climate models in the 1960s, made his career there.',
                'category' => 'news',
                'image_url' => 'https://yale-threesixty.transforms.svdcdn.com/production/NOAA-Meteorologist_Getty-HEADER.jpg?w=1000&h=562&auto=compress%2Cformat&fit=crop&dm=1742832761&s=5bfc87243d4832490eaa13a12d98c27d',
                'user_id' => $user->id
            ],
            [
                'title' => 'Imperiled in the Wild, Many Plants May Survive Only in Gardens',
                'description' => 'As the impacts of climate change and other threats mount, conservationists are racing to preserve endangered plant species in botanical garden “metacollections” in the hope of eventually returning them to the wild. But what happens when there is no suitable habitat to return them to?',
                'content' => 'In the spring of 1994, David Noble rappelled down the sheer cliff of a narrow canyon, part of a tangled maze of escarpments deeply incised into the sandstone tablelands in Australia’s Wollemi National Park, some 90 miles northwest of Sydney. There, the off-duty National Parks and Wildlife Service officer stumbled upon a strange group of towering trees with distinctive bubbly brown bark and deep green needles and cones. Later called the Wollemi pine, *Wollemia nobilis*, the species is a member of the ancient Araucariaceae family of conifers and had been presumed extinct for 70–90 million years. It was the equivalent of discovering a Tyrannosaurus still alive on Earth. Like other scientists working on the knife edge of emergency botany to save critically imperiled plants, Australian conservationists rushed to protect the Wollemi pine within its native habitat, an approach known as *in situ* conservation. There, a single population of just 45 mature individuals and 46 juveniles survive in the moist rainforest that occurs in deep gorges that have, for eons, been sheltered from wildfires that regularly ravage the dry vegetation atop the plateaus. The critically endangered conifer was an instant target for plant thieves, so the exact location of the trees is a closely guarded secret.',
                'image_url' => 'https://yale-threesixty.transforms.svdcdn.com/production/Wollemi-Pines-at-Wakehurst_RBG-Kew-HEADER.JPG?w=1000&h=562&auto=compress%2Cformat&fit=crop&dm=1742412499&s=80eb70c7c841bcd4d8948d0310698680',
                'user_id' => $user->id
            ],
            [
                'title' => 'Saving U.S. Climate and Environmental Data Before It Goes Away',
                'description' => 'Some 2,000 records went missing from government data sets after the Trump administration took office in January. Canadian geographer Eric Nost talks about the work he and colleagues are doing to archive data related to climate and the environment while it is still accessible.',
                'content' => 'Since Donald Trump returned to the White House, thousands of government data sets have been altered or removed, including key tools that researchers and policymakers use to track which communities are most at risk from climate change and toxic hazards. Eric Nost is a geographer and policy scholar at the University of Guelph in Canada who has been working with the U.S.-based Environmental Data and Governance Initiative to help track and back up these resources before they are lost. He says while every administration change comes with website alterations and shifts to how data is presented or organized, this time things are very different. “When you start taking down this information, changing how issues are described and doing so in misleading ways,” he says, “really, what it is, is censorship and propaganda.” He spoke to Yale Environment 360 about his efforts. Yale Environment 360: What did you and your colleagues at the Environmental Data and Governance Initiative start doing when it became clear in 2024 that Trump might be returning to the White House? Eric Nost: Given the possibility of Trump being elected again, there was planning in the works as the Biden administration came to a close. The Wayback Machine, which takes snapshots of pages over time, is great at capturing static web pages, not so great at archiving the data sets you need to click on and download. So, we began reaching out and working with partners, eventually coming to call ourselves the Public Environmental Data Partners. We developed a list of several hundred data sets across U.S. federal agencies that we used frequently and also did a public solicitation. That list turned out to be several hundred data sets, which is a lot. From this we whittled down to a list of 60 data sets we felt were really at risk, which we divvied up and archived in a variety of ways, downloading it and making it available one way or another. e360: What has happened since Trump returned to office in January? Nost: Data.gov is a central repository of government data sets that indexes things and makes them easier to find: As of the end of January, around 2,000 records had gone missing on Data.gov, out of a grand total of about 308,000. It doesn’t necessarily mean that the data are gone from the record forever. But it’s certainly not good, because it’s making it all less available.',
                'category' => 'news',
                'image_url' => 'https://yale-threesixty.transforms.svdcdn.com/production/NOAA-Monitors_Getty-HEADER.jpg?w=1000&h=562&auto=compress%2Cformat&fit=crop&dm=1741894862&s=ca6efbea8a984753ae592e3b19899574',
                'user_id' => $user->id
            ],
            [
                'title' => 'With Sea Ice Melting, Killer Whales Are Moving Into the Arctic',
                'description' => 'Killer whales have begun to migrate farther into previously icy regions of the Arctic, preying on narwhal, beluga, and bowhead. Scientists say their increasing numbers could shift food webs in ways that affect both endangered whale populations and subsistence Inuit hunters.',
                'content' => 'In the winter of 2020, Inuit hunters in Canada’s Central Arctic came across the frozen carcasses of 11 beached bowhead whales, enormous marine mammals that have made a slow but steady comeback since they were driven to the brink of extinction by late 19th and early 20th century whalers. Unsure of what killed the whales, the hunters contacted officials at Fisheries and Oceans Canada. Prevented from flying up by the Covid quarantine, scientists instead examined photos and tissue samples sent by the Inuit. The whales were young, thin, and scarred by what looked like teeth marks. “There was no smoking gun,” according to biologist Jeff Higdon. But he says that the perpetrators were very likely orcas, also called killer whales, which were rarely seen in the High Arctic until sea ice began to retreat, opening pathways for other marine life, including salmon, to enter. What makes this situation even more intriguing, according to University of Manitoba evolutionary geneticist Colin Garroway, is that these killer whales are likely members of an ecotype — a genetically distinct geographic variety — that has begun migrating farther into previously icy regions of the Arctic from as far away as Spain. Unlike orcas in other parts of the Arctic, which eat fish, this ecotype preys on large mammals. If their numbers continue to grow, say scientists who are watching this closely, they could upend or shift the food web in ways that could affect Inuit subsistence hunting and some endangered whale populations.',
                'category' => 'news',
                'image_url' => 'https://yale-threesixty.transforms.svdcdn.com/production/Norway-Orca_Getty-HEADER-SMALL.jpg?w=1000&h=562&auto=compress%2Cformat&fit=crop&dm=1739386160&s=fd79253d948de361117bac723e3fa61c',
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
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Expanded Support for Schools',
                'description' => 'Planit now partners with over 200 educational institutions.',
                'content' => 'We’re proud to announce new partnerships with universities and secondary schools to bring climate education to classrooms.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Carbon Offsets Now Available In-App',
                'description' => 'Offset your emissions directly through your dashboard.',
                'content' => 'You can now fund certified reforestation and renewable energy projects directly from your Planit profile.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'Planit Joins UN Climate Pact',
                'description' => 'We’re now an official signatory to the UN Race to Zero.',
                'content' => 'As part of our commitment to net-zero operations, Planit has joined a global pact of companies pushing for ambitious climate goals.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
                'user_id' => $user->id
            ],
            [
                'title' => 'New Regional Moderators Appointed',
                'description' => 'Welcome our community leaders across 5 new regions.',
                'content' => 'To support local action, we’ve appointed moderators in Ireland, Germany, Kenya, Chile, and Vietnam. They’ll help highlight stories and organize events.',
                'category' => 'announcement',
                'image_url' => 'images/placeholder_announcement.jpg',
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
