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
        $user = auth()->user();
        $user->completedActivities()->attach($activity->id);
    
        // Store the reduction in the activity_reductions table
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
    
        // Count completed activities per category
        $completedByCategory = $user->completedActivities()
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category'); // ['energy' => 3, 'food' => 2, etc.]
    
        $completedCount = $user->completedActivities()->count();
        $alreadyUnlocked = $user->achievements->pluck('id');
    
        // General achievements
        $generalAchievements = \App\Models\Achievement::where('category', 'general')
            ->where('points_required', '<=', $completedCount)
            ->whereNotIn('id', $alreadyUnlocked)
            ->get();
    
        // Category-based achievements
        $categoryAchievements = \App\Models\Achievement::where('category', '!=', 'general')
            ->whereNotIn('id', $alreadyUnlocked)
            ->get()
            ->filter(function ($achievement) use ($completedByCategory) {
                return isset($completedByCategory[$achievement->category]) &&
                       $completedByCategory[$achievement->category] >= $achievement->points_required;
            });
    
        // All-category achievement
        $allCategories = ['energy', 'food', 'waste', 'land', 'air', 'sea'];
        $hasAllCategories = !array_diff($allCategories, $completedByCategory->keys()->toArray());
        $allTypesAchievement = null;
    
        if ($hasAllCategories) {
            $allTypesAchievement = \App\Models\Achievement::where('category', 'general')
                ->where('description', 'Completed all activity types')->first();
        }
    
        $toUnlock = $generalAchievements
            ->merge($categoryAchievements);
    
        if ($allTypesAchievement && !$alreadyUnlocked->contains($allTypesAchievement->id)) {
            $toUnlock->push($allTypesAchievement);
        }
    
        if ($toUnlock->isNotEmpty()) {
            $user->achievements()->attach($toUnlock);
        }
    
        return redirect()->route('activities.index')->with('success', 'Activity completed.');
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////
    
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
