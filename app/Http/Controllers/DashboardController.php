<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user->onboarded) {
            return redirect()->route('onboarding');
        }

        $emissions = $user->userEmissions()->latest()->first();

        return view('dashboard', compact('emissions'));
    }
}
