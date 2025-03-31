<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class CompletedActivityController extends Controller
{
    public function store(Activity $activity)
    {
        auth()->user()->completedActivities()->attach($activity->id);

        // Update the user's level based on the number of completed activities
        $user = auth()->user();
        $user->level = $user->calculateLevel(); // Calculate the new level
        $user->save(); // Save the updated level

        return back()->with('success', 'Activity completed.');
    }

    public function destroy(Activity $activity)
    {
        auth()->user()->completedActivities()->detach($activity->id);

        // Update the user's level based on the new number of completed activities
        $user = auth()->user();
        $user->level = $user->calculateLevel(); // Recalculate the level after detaching the activity
        $user->save(); // Save the updated level

        return back()->with('success', 'Activity uncompleted.');
    }
}
