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

        return view('profile.edit', compact('user'));
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

            //Gives image a human-readable name
            $randomInt = random_int(10000, 99999);
            $sanitizedName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $request->user()->name);
            $imageName = $request->user()->id . '_' . $sanitizedName . '_' . $randomInt . '.png';
            
            $imagePath = 'profile_pictures/' . $imageName;
        
            // Delete previous image if it exists and is not the default
            if ($request->user()->image_url && $request->user()->image_url !== 'images/default-profile.png') {
                \Storage::disk('public')->delete($request->user()->image_url);
            }
        
            \Storage::disk('public')->put($imagePath, base64_decode($image));
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
