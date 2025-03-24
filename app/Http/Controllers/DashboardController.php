<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $favouritedActivities = auth()->user()->favouritedActivities()->latest()->take(2)->get(); //Will only retrieve the latest two.
        $emissions = $user->userEmissions()->latest()->first();

        if (!$user->onboarded) {
            return redirect()->route('onboarding');
        }

        return view('dashboard', compact('emissions', 'favouritedActivities'));
        
    }
}
