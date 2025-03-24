<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEmission;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get the latest 2 favourited activities
        $favouritedActivities = $user->favouritedActivities()->latest()->take(2)->get();
        
        // Get the user's emissions data
        $emissions = $user->userEmissions()->latest()->first();

        // If the user hasn't completed onboarding, redirect to onboarding
        if (!$user->onboarded) {
            return redirect()->route('onboarding');
        }

        // Calculate the average emissions for users in the same country
        $countryEmissions = UserEmission::where('user_id', '!=', $user->id)
            ->whereHas('user', function ($query) use ($user) {
                $query->where('country', $user->country);
            })
            ->selectRaw('AVG(baseline_food) as food, AVG(baseline_waste) as waste, AVG(baseline_energy) as energy, 
                         AVG(baseline_land) as land, AVG(baseline_air) as air, AVG(baseline_sea) as sea')
            ->first();

        // Calculate the overall average emissions for all users
        $overallEmissions = UserEmission::selectRaw('AVG(baseline_food) as food, AVG(baseline_waste) as waste, AVG(baseline_energy) as energy, 
                                                    AVG(baseline_land) as land, AVG(baseline_air) as air, AVG(baseline_sea) as sea')
            ->first();

        // Return the dashboard view with the user's data, country average, and overall average emissions
        return view('dashboard', [
            'emissions' => $emissions,
            'favouritedActivities' => $favouritedActivities,
            'countryEmissions' => $countryEmissions,
            'overallEmissions' => $overallEmissions,
        ]);
    }
}
