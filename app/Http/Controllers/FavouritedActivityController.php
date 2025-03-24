<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class FavouritedActivityController extends Controller
{
    public function index()
    {
        $favouritedActivities = auth()->user()->favouritedActivities;
        return view('favouritedactivities.index', compact('favouritedActivities'));
    }

    public function store(Activity $activity)
    {
        auth()->user()->favouritedActivities()->attach($activity->id);
        return back()->with('success', 'Activity favourited.');
    }

    public function destroy(Activity $activity)
    {
        auth()->user()->favouritedActivities()->detach($activity->id);
        return back()->with('success', 'Activity unfavourited.');
    }
}
