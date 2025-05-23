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
                'description' => 'By taking public transportation such as buses, trains, or subways instead of driving a car, you can significantly reduce your carbon emissions. Public transport is generally more energy-efficient than private cars, as they carry many passengers at once, thus reducing the per capita emissions. If more people choose buses or trains over personal vehicles, there would be a decrease in traffic congestion, less air pollution, and less energy consumption. Moreover, public transport often uses cleaner technologies, such as electric trains, which further minimize emissions. By switching from driving to public transport, you are not only contributing to lowering your own carbon footprint but also encouraging others in your community to adopt sustainable travel habits.',
                'difficulty' => 'easy',
                'impact_points' => 20,
                'image_url' => 'https://images.pexels.com/photos/106773/pexels-photo-106773.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Reducing meat consumption has a direct and significant impact on your carbon footprint. Meat production is one of the most resource-intensive industries, contributing to deforestation, greenhouse gas emissions, and water waste. By choosing plant-based options, even for just one week, you are helping reduce the demand for animal farming, thus decreasing the environmental toll it takes. Not only does this have a positive effect on the environment, but it also helps in preserving biodiversity, as the land and water used for grazing animals can be better utilized for reforestation or conservation efforts. Furthermore, plant-based diets can have health benefits, such as lowering the risk of heart disease, obesity, and diabetes, promoting overall well-being. By committing to a meat-free week, you set an example of how small dietary changes can make a big difference.',
                'difficulty' => 'medium',
                'impact_points' => 30,
                'image_url' => 'https://images.pexels.com/photos/1143754/pexels-photo-1143754.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Switching to energy-efficient LED bulbs can have a profound effect on reducing household energy consumption. Unlike incandescent or fluorescent bulbs, LEDs consume much less electricity, reducing your energy bill and carbon footprint. This small but impactful change can make a big difference when considering that lighting accounts for a significant portion of home energy use. In addition to being more energy-efficient, LEDs have a longer lifespan, meaning they need to be replaced less often, reducing waste. By opting for LED bulbs, you are not only saving money but also contributing to global energy conservation efforts, helping reduce demand on power plants and lower emissions from fossil fuels.',
                'difficulty' => 'easy',
                'impact_points' => 15,
                'image_url' => 'https://images.pexels.com/photos/3804120/pexels-photo-3804120.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Recycling is one of the simplest and most effective ways to reduce the environmental impact of waste. By recycling paper, plastic, metal, and glass, we divert materials from landfills, where they would otherwise take up space and release harmful gases into the atmosphere. Recycling reduces the need for new raw materials, conserving natural resources such as trees, water, and minerals. It also saves energy, as recycling typically uses less energy than producing new products from raw materials. Additionally, recycling helps reduce pollution by keeping hazardous materials out of landfills, preventing them from contaminating soil and water. By committing to recycle all your household waste for a week, you are actively contributing to a more sustainable world and setting a positive example for others.',
                'difficulty' => 'easy',
                'impact_points' => 10,
                'image_url' => 'https://images.pexels.com/photos/802221/pexels-photo-802221.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Air travel is one of the largest sources of greenhouse gas emissions. Flying, especially over long distances, releases large amounts of carbon dioxide and other pollutants into the atmosphere. By choosing to avoid flying and opting for alternative modes of transportation, such as trains, buses, or even road trips, you can significantly reduce your carbon footprint. While it may require more time and planning, taking a train or bus can be a much more sustainable option, especially for shorter distances. Additionally, traveling locally not only benefits the environment but can also help you explore your own country or region in a more relaxed and rewarding way. By avoiding a flight, you contribute to reducing the overall environmental impact of the transportation sector.',
                'difficulty' => 'hard',
                'impact_points' => 50,
                'image_url' => 'https://images.pexels.com/photos/1004584/pexels-photo-1004584.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Switching to a green energy supplier, or renewable energy source, is one of the most powerful steps you can take to reduce your carbon footprint. Green energy is generated from renewable resources such as wind, solar, and hydropower, which emit little to no greenhouse gases. By choosing a green energy supplier, you help reduce reliance on fossil fuels like coal and natural gas, which contribute to climate change. Furthermore, renewable energy sources are often cleaner and more sustainable in the long run, promoting energy security and environmental protection. Supporting green energy suppliers also encourages the broader transition to sustainable energy infrastructure, helping to fight climate change on a larger scale.',
                'difficulty' => 'medium',
                'impact_points' => 40,
                'image_url' => 'https://images.pexels.com/photos/1108572/pexels-photo-1108572.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Drying clothes in a dryer is energy-intensive, contributing to high energy consumption and carbon emissions. By switching to a clothesline, you can save energy and reduce your carbon footprint. The benefits of air-drying clothes are twofold: you save electricity by not using the dryer, and you also extend the life of your clothes by avoiding the wear and tear caused by machine drying. Additionally, air-drying reduces the use of toxic chemicals in fabric softeners and detergents, promoting a cleaner environment. By simply hanging your clothes out to dry, you make a positive environmental impact, reduce household energy costs, and promote sustainability in your daily life.',
                'difficulty' => 'easy',
                'impact_points' => 10,
                'image_url' => 'https://images.pexels.com/photos/980356/pexels-photo-980356.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Switching to plant-based milk alternatives is an effective way to reduce your environmental impact, particularly in terms of land use, water consumption, and greenhouse gas emissions. The dairy industry is a significant contributor to environmental degradation due to the resources required to raise livestock, the methane emissions from cows, and the large amounts of water needed for dairy production. Plant-based milks, such as almond, soy, and oat milk, require fewer resources and have a smaller carbon footprint. By choosing plant-based milk, you help conserve water, reduce the demand for animal farming, and promote sustainable agriculture. Additionally, plant-based milks are often lower in calories and cholesterol, making them a healthier option.',
                'difficulty' => 'medium',
                'impact_points' => 20,
                'image_url' => 'https://images.pexels.com/photos/3735169/pexels-photo-3735169.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Planting trees is one of the most effective and natural ways to combat climate change. Trees absorb carbon dioxide (CO2) from the atmosphere and store it, helping to mitigate the effects of greenhouse gases. They also improve air quality by producing oxygen and can help prevent soil erosion, conserve water, and provide habitats for wildlife. By planting trees in your community, you contribute to local biodiversity and support environmental sustainability. Tree planting initiatives can also have social and economic benefits by creating green spaces that improve mental well-being, increase property values, and promote environmental stewardship among local residents. Planting trees is a simple yet powerful way to take action against climate change.',
                'difficulty' => 'hard',
                'impact_points' => 60,
                'image_url' => 'https://images.pexels.com/photos/31439617/pexels-photo-31439617/free-photo-of-three-farmers-working-in-muddy-field-in-nigeria.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Supporting local farms by buying locally grown produce is an effective way to reduce your environmental impact. Transporting food over long distances requires significant amounts of energy and contributes to greenhouse gas emissions. By choosing locally grown produce, you help reduce the carbon footprint associated with food transportation. Additionally, locally grown food is often fresher, tastier, and more nutritious. Purchasing locally supports local economies and promotes sustainable farming practices, which can reduce pesticide use and promote biodiversity. By making small changes in your purchasing habits, you can help foster a more sustainable food system.',
                'difficulty' => 'easy',
                'impact_points' => 25,
                'image_url' => 'https://images.pexels.com/photos/868110/pexels-photo-868110.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Composting is one of the most sustainable ways to manage organic waste. By turning food scraps, yard waste, and other organic materials into compost, you can reduce the amount of waste sent to landfills, where it would decompose anaerobically and produce harmful methane emissions. Composting not only reduces waste but also produces nutrient-rich soil that can be used for gardening, landscaping, and agricultural purposes. By composting, you close the loop in the waste cycle, turning organic waste into a valuable resource. It also helps to conserve landfill space and reduces the need for synthetic fertilizers, which can have negative environmental impacts.',
                'difficulty' => 'medium',
                'impact_points' => 30,
                'image_url' => 'https://images.pexels.com/photos/5479034/pexels-photo-5479034.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'A smart thermostat is an excellent tool for saving energy and reducing your carbon footprint. These devices allow you to control your home’s temperature efficiently by automatically adjusting heating and cooling based on your schedule. Unlike traditional thermostats, smart thermostats can be controlled remotely via a smartphone app, giving you the flexibility to adjust your home’s temperature even when you’re not there. By maintaining an optimal temperature without overuse, you can reduce energy consumption and save on utility bills. Additionally, smart thermostats learn from your habits over time, further optimizing your energy usage. This small investment can lead to significant savings and a reduction in your home’s carbon emissions.',
                'difficulty' => 'medium',
                'impact_points' => 40,
                'image_url' => 'https://images.pexels.com/photos/7616651/pexels-photo-7616651.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Single-use plastics, such as bottles, bags, and packaging, contribute significantly to environmental pollution. By reducing your reliance on these products, you help reduce plastic waste that ends up in landfills, oceans, and other natural environments. Switching to reusable alternatives, such as metal or glass bottles, fabric bags, and containers, can significantly reduce the amount of plastic waste you generate. This simple change not only helps reduce plastic pollution but also encourages others to adopt sustainable habits. By cutting down on single-use plastics, you contribute to cleaner environments, protect marine life, and support sustainable production and consumption patterns.',
                'difficulty' => 'medium',
                'impact_points' => 20,
                'image_url' => 'https://images.pexels.com/photos/2547565/pexels-photo-2547565.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
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
                'description' => 'Single-use plastics pose a significant threat to marine ecosystems. When plastics are discarded improperly, they often end up in rivers, lakes, and oceans, harming marine life and polluting water sources. By reducing your plastic consumption, especially near bodies of water, you can help mitigate this environmental issue. Simple actions such as bringing reusable bags to the beach, using biodegradable products, and properly disposing of plastic waste can prevent plastic from entering the water. By making these small changes, you help protect marine life, reduce pollution, and ensure cleaner water sources for future generations.',
                'difficulty' => 'medium',
                'impact_points' => 40,
                'image_url' => 'https://images.pexels.com/photos/4813983/pexels-photo-4813983.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 150,
                'category' => 'sea',
            ],
            [
                'name' => 'Switch to Electric Vehicle',
                'description' => 'Switching to an electric vehicle (EV) is one of the most effective ways to reduce your carbon footprint, especially if you currently drive a gas-powered car. EVs produce zero tailpipe emissions, which significantly lowers your contribution to air pollution and greenhouse gas emissions. The production of electricity to charge EVs may still result in emissions depending on the energy source, but this can be minimized by switching to green energy. Additionally, EVs are more efficient, saving you money on fuel and maintenance in the long run. By making the switch, you contribute to the wider adoption of electric vehicles and sustainable transportation, helping to reduce our dependence on fossil fuels and fight climate change.',
                'difficulty' => 'hard',
                'impact_points' => 80,
                'image_url' => 'https://images.pexels.com/photos/14611055/pexels-photo-14611055.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 100,  
                'reduction_land' => 0,
                'reduction_air' => 400,
                'reduction_sea' => 0,
                'category' => 'land',
            ],
            [
                'name' => 'Install a Rainwater Harvesting System',
                'description' => 'A rainwater harvesting system allows you to collect and store rainwater for use in gardening, landscaping, or even household use. By harvesting rainwater, you can reduce the amount of potable water used for non-essential purposes, such as watering lawns or washing cars. This not only helps conserve water but also reduces the energy required to pump water from municipal sources, which is typically powered by electricity derived from fossil fuels. Additionally, rainwater is often free from the chemicals and salts found in municipal water supplies, making it ideal for plant care. Installing a rainwater system is a great step towards sustainability, helping conserve valuable resources and reduce overall water consumption.',
                'difficulty' => 'medium',
                'impact_points' => 60,
                'image_url' => 'https://images.pexels.com/photos/375691/pexels-photo-375691.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 0,  
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'land',
            ],
            [
                'name' => 'Install Solar Panels',
                'description' => 'By installing solar panels on your home, you can generate your own clean, renewable energy, reducing your reliance on fossil fuels and lowering your carbon footprint. Solar panels convert sunlight into electricity, providing an eco-friendly alternative to conventional energy sources. This not only reduces greenhouse gas emissions but also helps lower your energy bills over time. The technology has become more affordable, and there are often incentives available for those who want to install solar panels. By investing in solar energy, you contribute to a cleaner, more sustainable future and encourage others to follow suit.',
                'difficulty' => 'hard',
                'impact_points' => 100,
                'image_url' => 'https://images.pexels.com/photos/356036/pexels-photo-356036.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 0,
                'reduction_energy' => 200,  
                'reduction_land' => 0,
                'reduction_air' => 500,
                'reduction_sea' => 0,
                'category' => 'energy',
            ],
            [
                'name' => 'Compost Your Yard Waste',
                'description' => 'Composting yard waste, such as leaves, grass clippings, and small branches, is a great way to reduce landfill waste and create nutrient-rich soil for your garden. Yard waste that is sent to landfills typically decomposes anaerobically, producing methane, a potent greenhouse gas. By composting it, you not only reduce methane emissions but also create a valuable resource for your garden. Compost improves soil structure, enhances water retention, and provides essential nutrients to plants, promoting a healthier garden. By composting yard waste, you can contribute to the health of your garden, reduce landfill waste, and lower your environmental impact.',
                'difficulty' => 'easy',
                'impact_points' => 15,
                'image_url' => 'https://images.pexels.com/photos/24595685/pexels-photo-24595685/free-photo-of-plastic-bags-in-a-yard.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 50,  
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'land',
            ],
            [
                'name' => 'Use a Reusable Coffee Cup',
                'description' => 'Disposable coffee cups and their plastic lids are a major contributor to landfill waste. By switching to a reusable coffee cup, you help reduce the need for single-use cups and lids, which are often not recyclable. Reusable cups come in a variety of materials such as stainless steel, bamboo, or glass, and many are insulated to keep your drink hot or cold for longer. By investing in a reusable cup, you can help reduce the environmental impact of your daily coffee habits and encourage coffee shops to adopt more sustainable practices. Additionally, many coffee shops offer discounts for customers who bring their own cups, making this an easy, cost-effective choice.',
                'difficulty' => 'easy',
                'impact_points' => 10,
                'image_url' => 'https://images.pexels.com/photos/298492/pexels-photo-298492.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 25,  
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'waste',
            ],
            [
                'name' => 'Buy Secondhand Furniture',
                'description' => 'Purchasing secondhand furniture instead of new items helps reduce the demand for new raw materials and minimizes the carbon footprint associated with manufacturing. The production of new furniture often involves energy-intensive processes, including the extraction of natural resources, manufacturing, and transportation. By buying secondhand, you are extending the life of existing products, reducing waste, and conserving resources. Additionally, secondhand furniture often comes at a fraction of the price of new items, making it a more affordable and sustainable option. Buying secondhand is also an excellent way to find unique and vintage pieces that add character to your home.',
                'difficulty' => 'medium',
                'impact_points' => 35,
                'image_url' => 'https://images.pexels.com/photos/116907/pexels-photo-116907.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 100,  
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'waste',
            ],
            [
                'name' => 'Use a Smart Power Strip',
                'description' => 'Smart power strips are an easy way to reduce energy consumption in your home. These strips automatically cut power to electronics when they are not in use, preventing energy waste from "phantom loads" (the power consumed by electronics when they are switched off but still plugged in). This small but impactful change can help reduce your electricity usage and lower your energy bills. Many smart power strips also have surge protection, helping to protect your electronics from damage caused by power surges. By investing in a smart power strip, you are making a simple yet effective change that can have long-term energy-saving benefits.',
                'difficulty' => 'easy',
                'impact_points' => 15,
                'image_url' => 'https://images.pexels.com/photos/9185851/pexels-photo-9185851.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 0,  
                'reduction_energy' => 75,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'energy',
            ],
            [
                'name' => 'Choose Energy-Efficient Appliances',
                'description' => 'Upgrading to energy-efficient appliances is a simple way to lower your energy consumption and reduce your carbon footprint. Energy-efficient appliances use less electricity and water to perform the same tasks, which can result in significant savings on your utility bills over time. These appliances are designed to meet high efficiency standards, which often include using less energy, reducing greenhouse gas emissions, and conserving natural resources. By choosing appliances that have earned an energy efficiency certification, such as ENERGY STAR, you are making a conscious choice to support sustainability and minimize your environmental impact.',
                'difficulty' => 'medium',
                'impact_points' => 40,
                'image_url' => 'https://images.pexels.com/photos/27390284/pexels-photo-27390284/free-photo-of-home-living-room-kitchen-interior.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 0,  
                'reduction_energy' => 200,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'energy',
            ],
            [
                'name' => 'Host a Local Cleanup Event',
                'description' => 'Organizing a local cleanup event is an excellent way to engage your community in environmental stewardship. Cleaning up parks, beaches, or streets not only helps beautify your area but also reduces waste, prevents pollution, and protects wildlife. Organizing such events is a great way to bring together neighbors and raise awareness about environmental issues. Cleanup events often result in the collection of plastic waste, litter, and other pollutants that would otherwise end up in landfills or natural habitats. Hosting a local cleanup event is a hands-on way to take direct action against pollution and encourage others to get involved in sustainability efforts.',
                'difficulty' => 'medium',
                'impact_points' => 50,
                'image_url' => 'https://images.pexels.com/photos/735319/pexels-photo-735319.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'reduction_food' => 0,
                'reduction_waste' => 300,  
                'reduction_energy' => 0,
                'reduction_land' => 0,
                'reduction_air' => 0,
                'reduction_sea' => 0,
                'category' => 'waste',
            ]                        
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
