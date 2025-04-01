<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\ActivityReduction; // New Model
use Illuminate\Http\Request;

class CompletedActivityController extends Controller
{
    public function store(Activity $activity)
    {
        auth()->user()->completedActivities()->attach($activity->id);
    
        // Store the reduction in the activity_reductions table
        $user = auth()->user();
        $reduction = new ActivityReduction([
            'user_id' => $user->id,
            'activity_id' => $activity->id,
            'reduction_food' => $activity->reduction_food,
            'reduction_waste' => $activity->reduction_waste,
            'reduction_energy' => $activity->reduction_energy,
            'reduction_land' => $activity->reduction_land,
            'reduction_air' => $activity->reduction_air,
            'reduction_sea' => $activity->reduction_sea,
        ]);
        $reduction->save();
    
        // Update the user's level based on the number of completed activities
        $user->level = $user->calculateLevel();
        $user->save();
    
        // Detach completed activities from favourites
        $user->favouritedActivities()->detach($activity->id);
    
        // Award achievements based on number of completed activities
        $completedCount = $user->completedActivities()->count();
        $eligibleAchievements = \App\Models\Achievement::where('points_required', '<=', $completedCount)
            ->whereNotIn('id', $user->achievements->pluck('id'))
            ->get();
    
        if ($eligibleAchievements->isNotEmpty()) {
            $user->achievements()->attach($eligibleAchievements);
        }
    
        return redirect()->route('activities.index')->with('success', 'Activity completed.');
    }
    

    public function destroy(Activity $activity)
    {
        auth()->user()->completedActivities()->detach($activity->id);

        // Remove the reduction from activity_reductions table
        ActivityReduction::where('user_id', auth()->user()->id)
                         ->where('activity_id', $activity->id)
                         ->delete();

        // Update the user's level based on the number of completed activities
        $user = auth()->user();
        $user->level = $user->calculateLevel();
        $user->save();

        return redirect()->route('activities.index')->with('success', 'Activity uncompleted.');
    }
}
