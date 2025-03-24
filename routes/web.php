<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FavouritedActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect users to onboarding if not completed, else goes to dashboard.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding');
    Route::post('/onboarding', [OnboardingController::class, 'store']);
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Activity Routes
Route::get('/activities', [ActivityController::class, 'index'])->middleware(['auth'])->name('activities.index');
Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');

// Favourited Activity Routes
Route::middleware('auth')->group(function () {
    // I had to change this route to be saprate from the group because the other routes need activity as a prefix.
    Route::get('/favourited', [FavouritedActivityController::class, 'index'])->name('favouritedactivities.index');    
    Route::controller(FavouritedActivityController::class)->group(function () {
        Route::post('{activity}/favourite', 'store')->name('activities.favourite');
        Route::delete('{activity}/favourite', 'destroy')->name('activities.unfavourite');
    });
});

require __DIR__.'/auth.php';
