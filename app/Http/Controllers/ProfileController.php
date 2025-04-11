<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = auth()->user();

        $levelTitle = match(true) {
            auth()->user()->level === 1 => 'Novice Savour',
            auth()->user()->level <= 3 => 'Adept Advocate',
            auth()->user()->level <= 5 => 'Skilled Guardian',
            auth()->user()->level <= 10 => 'Expert Envoy',
            default => 'Master of Change',
        };

        $titles = [
            1 => 'Novice Savour',
            2 => 'Adept Ally',
            3 => 'Skilled Steward',
            4 => 'Expert Envoy',
            5 => 'Master Guardian',
            6 => 'Legendary Luminary'
        ];
        $levelTitle = $titles[auth()->user()->level] ?? 'Eco Explorer';

        return view('profile.edit', compact('user', 'levelTitle', 'titles'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
    
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
    
        if ($request->filled('cropped_image')) {
            $base64Image = $request->input('cropped_image');
            $image = str_replace('data:image/png;base64,', '', $base64Image);
            $image = str_replace(' ', '+', $image);
    
            // Generate image name
            $randomInt = random_int(10000, 99999);
            $sanitizedName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $request->user()->name);
            $imageName = $request->user()->id . '_' . $sanitizedName . '_' . $randomInt . '.png';
    
            $imagePath = 'images/profile_pictures/' . $imageName;
            $fullImagePath = public_path($imagePath);
    
            // Delete previous image if not default
            if ($request->user()->image_url && $request->user()->image_url !== 'images/default-profile.png') {
                $existingPath = public_path($request->user()->image_url);
                if (file_exists($existingPath)) {
                    unlink($existingPath);
                }
            }
    
            // Save the new image
            file_put_contents($fullImagePath, base64_decode($image));
            $request->user()->image_url = $imagePath;
        }
    
        $request->user()->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
