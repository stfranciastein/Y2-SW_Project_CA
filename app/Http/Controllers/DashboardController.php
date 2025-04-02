<?php

namespace App\Http\Controllers;

use App\Models\UserEmission;
use App\Models\Activity;
use App\Models\ActivityReduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
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

        // Calculate the total reductions based on completed activities
        $totalReductions = $user->completedActivities()->with('activityReductions')->get()->reduce(function ($carry, $activity) {
            $reduction = $activity->activityReductions->first(); // Assuming only one reduction per activity
            if ($reduction) {
                $carry['food'] += $reduction->reduction_food;
                $carry['waste'] += $reduction->reduction_waste;
                $carry['energy'] += $reduction->reduction_energy;
                $carry['land'] += $reduction->reduction_land;
                $carry['air'] += $reduction->reduction_air;
                $carry['sea'] += $reduction->reduction_sea;
            }
            return $carry;
        }, [
            'food' => 0,
            'waste' => 0,
            'energy' => 0,
            'land' => 0,
            'air' => 0,
            'sea' => 0
        ]);

        // Subtract the reductions from the baseline emissions
        $userEmissions = [
            'food' => max(0, $emissions->baseline_food - $totalReductions['food']),
            'waste' => max(0, $emissions->baseline_waste - $totalReductions['waste']),
            'energy' => max(0, $emissions->baseline_energy - $totalReductions['energy']),
            'land' => max(0, $emissions->baseline_land - $totalReductions['land']),
            'air' => max(0, $emissions->baseline_air - $totalReductions['air']),
            'sea' => max(0, $emissions->baseline_sea - $totalReductions['sea']),
        ];

        $userTotalEmissions = array_sum($userEmissions);

        // Calculate the average emissions for users in the same country with reductions
        $countryEmissions = UserEmission::where('user_id', '!=', $user->id)
            ->whereHas('user', function ($query) use ($user) {
                $query->where('country', $user->country);
            })
            ->selectRaw('AVG(baseline_food) as food, AVG(baseline_waste) as waste, AVG(baseline_energy) as energy, 
                         AVG(baseline_land) as land, AVG(baseline_air) as air, AVG(baseline_sea) as sea')
            ->first();

        $countryAverageEmissions = $countryEmissions
            ? $countryEmissions->food + $countryEmissions->waste + $countryEmissions->energy + $countryEmissions->land + $countryEmissions->air + $countryEmissions->sea
            : null;

        // Calculate the overall average emissions for all users with reductions
        $overallEmissions = UserEmission::selectRaw('AVG(baseline_food) as food, AVG(baseline_waste) as waste, AVG(baseline_energy) as energy, 
                                                    AVG(baseline_land) as land, AVG(baseline_air) as air, AVG(baseline_sea) as sea')
            ->first();

        $difference = $countryAverageEmissions ? $userTotalEmissions - $countryAverageEmissions : null;
        $percentDiff = $countryAverageEmissions ? round(($difference / $countryAverageEmissions) * 100) : null;
        $globalTotalEmissions = $overallEmissions->food + $overallEmissions->waste + $overallEmissions->energy + $overallEmissions->land + $overallEmissions->air + $overallEmissions->sea;
        $globalDifference = $globalTotalEmissions ? $userTotalEmissions - $globalTotalEmissions : null;
        $globalPercentDiff = $globalTotalEmissions ? round(($globalDifference / $globalTotalEmissions) * 100) : null;
        $unlocked = auth()->user()->achievements()->orderByPivot('created_at', 'desc')->get();


        return view('dashboard', [
            'emissions' => (object) $userEmissions,
            'favouritedActivities' => $favouritedActivities,
            'countryEmissions' => $countryEmissions,
            'overallEmissions' => $overallEmissions,
            'userTotalEmissions' => $userTotalEmissions,
            'countryAverageEmissions' => $countryAverageEmissions,
            'percentDiff'=> $percentDiff,
            'globalPercentDiff' => $globalPercentDiff,
            'unlocked' => $unlocked
        ]);
    }
}
