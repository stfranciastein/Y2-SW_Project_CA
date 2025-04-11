<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\FavouritedActivity;
use App\Models\CompletedActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activities = Activity::all();
        $categories = ['all' => 'All Activities', 'energy' => 'Energy', 'food' => 'Food', 'waste' => 'Waste', 'land' => 'Land', 'air' => 'Air', 'sea' => 'Sea'];
        $favouritedActivities = auth()->user()->favouritedActivities()
        ->orderBy('favourited_activities.created_at', 'desc')  // Sort by pivot table created_at field
        ->get();

        // Remember the completed activities need to subtract from the user's baseline emissions with the corresponding reduction emission from activity.
        $completedActivities = auth()->user()->completedActivities()
        ->orderBy('completed_activities.created_at', 'desc')  // Sort by pivot table created_at field
        ->get();

        $activeTab = $request->query('tab', 'general');
        $tabs = [
            'general' => 'General',
            'favourited' => 'Favourited',
            'completed' => 'Completed',
        ];

        return view('activities.index', compact('activities', 'categories', 'favouritedActivities', 'completedActivities', 'activeTab', 'tabs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities.create'); // Create a view for creating activities
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category' => 'required|in:energy,food,waste,land,air,sea',
            'difficulty' => 'required|in:easy,medium,hard',
            'impact_points' => 'required|integer',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'image_url' => 'nullable|string|max:1000', // This is just a string (URL)
            'reduction_food' => 'nullable|integer',
            'reduction_waste' => 'nullable|integer',
            'reduction_energy' => 'nullable|integer',
            'reduction_land' => 'nullable|integer',
            'reduction_air' => 'nullable|integer',
            'reduction_sea' => 'nullable|integer',
        ]);
    
        $imagePath = null;
    
        // Prioritize uploaded image over URL
        if ($request->hasFile('image_upload')) {
            $imagePath = 'images/activities/' . $request->file('image_upload')->getClientOriginalName();
            $request->file('image_upload')->move(public_path('images/activities'), $request->file('image_upload')->getClientOriginalName());
            
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url'); // Store full URL
        }
    
        Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'difficulty' => $request->difficulty,
            'impact_points' => $request->impact_points,
            'image_url' => $imagePath,
            'reduction_food' => $request->input('reduction_food', 0),
            'reduction_waste' => $request->input('reduction_waste', 0),
            'reduction_energy' => $request->input('reduction_energy', 0),
            'reduction_land' => $request->input('reduction_land', 0),
            'reduction_air' => $request->input('reduction_air', 0),
            'reduction_sea' => $request->input('reduction_sea', 0),
        ]);
    
        return redirect()->route('activities.index')->with('success', 'Activity created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        $relatedActivities = Activity::where('category', $activity->category)
            ->where('id', '!=', $activity->id)
            ->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))
            ->take(4)
            ->get();
    
        return view('activities.show', compact('activity', 'relatedActivities'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity')); // Create a view for editing activities
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category' => 'required|in:energy,food,waste,land,air,sea',
            'difficulty' => 'required|in:easy,medium,hard',
            'impact_points' => 'required|integer',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'image_url' => 'nullable|string|max:2048', // for external URLs
            'reduction_food' => 'nullable|integer',
            'reduction_waste' => 'nullable|integer',
            'reduction_energy' => 'nullable|integer',
            'reduction_land' => 'nullable|integer',
            'reduction_air' => 'nullable|integer',
            'reduction_sea' => 'nullable|integer',
        ]);
    
        // Upload new image if provided
        if ($request->hasFile('image_upload')) {
            $file = $request->file('image_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/activities'), $filename);
            $activity->image_url = 'images/activities/' . $filename;
        } elseif ($request->filled('image_url')) {
            // Use external URL if provided
            $activity->image_url = $request->input('image_url');
        }
    
        // Update the rest of the fields
        $activity->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'difficulty' => $request->difficulty,
            'impact_points' => $request->impact_points,
            'reduction_food' => $request->reduction_food,
            'reduction_waste' => $request->reduction_waste,
            'reduction_energy' => $request->reduction_energy,
            'reduction_land' => $request->reduction_land,
            'reduction_air' => $request->reduction_air,
            'reduction_sea' => $request->reduction_sea,
        ]);
    
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        // Delete the activity's image from storage if it exists
        if ($activity->image_url && file_exists(storage_path('app/public/' . $activity->image_url))) {
            unlink(storage_path('app/public/' . $activity->image_url));
        }

        // Delete the activity record from the database
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully');
    }
}
