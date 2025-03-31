<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\FavouritedActivity;
use Appp\Models\CompletedActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activities = Activity::all();

        $favouritedActivities = auth()->user()->favouritedActivities()
        ->orderBy('favourited_activities.created_at', 'desc')  // Sort by pivot table created_at field
        ->get();

        //Remember the completed activities need to subract from the user's baseline emissions with the corresponding reduction emission from activity.
        $completedActivities = auth()->user()->completedActivities()
        ->orderBy('completed_activities.created_at', 'desc')  // Sort by pivot table created_at field
        ->get();

        $activeTab = $request->query('tab', 'general');

        return view('activities.index', compact('activities', 'favouritedActivities', 'completedActivities', 'activeTab'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
