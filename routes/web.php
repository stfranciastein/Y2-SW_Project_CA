<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OnboardingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect users to onboarding if not completed, else goes to dashboard.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (!auth()->user()->onboarded) {
            return redirect()->route('onboarding');
        }
        return view('dashboard');
    })->name('dashboard');

    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding');
    Route::post('/onboarding', [OnboardingController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
