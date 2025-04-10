<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FavouritedActivityController;
use App\Http\Controllers\CompletedActivityController;
use App\Http\Controllers\AppPostController;
use App\Http\Controllers\AchievementController;
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
Route::middleware('auth')->group(function () {
    // Single route for the activities index page with 3 tabs
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
});


// Favourited Activity Routes
Route::middleware('auth')->group(function () {
    // I had to change this route to be seperate from the group because the other routes need activity as a prefix.
    Route::get('/favourited', [FavouritedActivityController::class, 'index'])->name('favouritedactivities.index');    
    Route::controller(FavouritedActivityController::class)->group(function () {
        Route::post('{activity}/favourite', 'store')->name('activities.favourite');
        Route::delete('{activity}/favourite', 'destroy')->name('activities.unfavourite');
    });
});

// Completed Activity Routes
Route::middleware('auth')->group(function () {
    Route::get('/completed', [CompletedActivityController::class, 'index'])->name('completeddactivities.index');    
    Route::controller(CompletedActivityController::class)->group(function () {
        Route::post('{activity}/completed', 'store')->name('activities.completed');
        Route::delete('{activity}/completed', 'destroy')->name('activities.uncompleted');
    });
});

// AppPost Routes
Route::middleware(['auth'])->group(function () {
    Route::middleware(['adminOrModerator'])->group(function () {
        Route::get('/appposts/create', [AppPostController::class, 'create'])->name('appposts.create');
        Route::get('/appposts/{apppost}/edit', [AppPostController::class, 'edit'])->name('appposts.edit');
        Route::put('/appposts/{apppost}', [AppPostController::class, 'update'])->name('appposts.update');
        Route::delete('/appposts/{apppost}', [AppPostController::class, 'destroy'])->name('appposts.destroy');
    });

    Route::resource('appposts', AppPostController::class)->only(['index', 'show', 'store']);
});




//Achievement Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements.index');
});


require __DIR__.'/auth.php';
