<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserEmission;

class OnboardingController extends Controller
{
    public function show()
    {
        return view('onboarding');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'baseline_food' => 'required|integer',
            'baseline_waste' => 'required|integer',
            'baseline_energy' => 'required|integer',
            'baseline_land' => 'required|integer',
            'baseline_air' => 'required|integer',
            'baseline_sea' => 'required|integer',
        ]);

        $user = Auth::user();

        // Store user's emissions
        UserEmission::create([
            'user_id' => $user->id,
            'baseline_food' => $validated['baseline_food'],
            'baseline_waste' => $validated['baseline_waste'],
            'baseline_energy' => $validated['baseline_energy'],
            'baseline_land' => $validated['baseline_land'],
            'baseline_air' => $validated['baseline_air'],
            'baseline_sea' => $validated['baseline_sea'],
        ]);

        // Mark user as onboarded
        $user->update(['onboarded' => true]);

        return redirect()->route('dashboard');
    }
}
