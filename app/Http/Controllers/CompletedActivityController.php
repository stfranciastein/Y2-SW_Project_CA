<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class CompletedActivityController extends Controller
{
    public function store(Activity $activity)
    {
        auth()->user()->completedActivities()->attach($activity->id);
        return back()->with('success', 'Activity completed.');
    }

    public function destroy(Activity $activity)
    {
        auth()->user()->completedActivities()->detach($activity->id);
        return back()->with('success', 'Activity uncompleted.');
    }
}
