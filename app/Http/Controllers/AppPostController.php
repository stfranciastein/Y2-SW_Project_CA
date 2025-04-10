<?php

namespace App\Http\Controllers;

use App\Models\AppPost;
use Illuminate\Http\Request;

class AppPostController extends Controller
{
    public function index(Request $request)
    {
        $appposts = AppPost::latest()->get();
        $activeTab = $request->query('tab', 'news');
        $newsPosts = $appposts->where('category', 'news');
        $latestNews = $newsPosts->first();
        $remainingNews = $newsPosts->skip(1);

        return view('appPosts.index', compact('appposts', 'activeTab', 'newsPosts', 'latestNews', 'remainingNews'));
    }   

    public function create()
    {
        // Show the form to create a new apppost
        return view('appPosts.create');
    }

    public function store(Request $request)
    {
        // Validate and create a new apppost
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:news,event,announcement',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        // Handle the file upload for image
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('posts', 'public');
        } else {
            $imagePath = null;
        }

        AppPost::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
            'description' => $request->description,
            'content' => $request->content,
            'category' => $request->category,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('appposts.index')->with('success', 'Post created successfully');
    }

    public function show(AppPost $apppost)
    {
        $role = auth()->user()->role;

        return view('appPosts.show', compact('apppost', 'role'));
    }

    public function edit(AppPost $apppost)
    {
        // Show the form to edit an apppost you just reused create because create handles the difference
        return view('appPosts.create', compact('apppost'));
    }

    public function update(Request $request, AppPost $apppost)
    {
        // Validate and update the apppost
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:news,event,announcement',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle the file upload for image
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('posts', 'public');
        } else {
            $imagePath = $apppost->image_url; // Keep the original image if no new image is uploaded
        }

        $apppost->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category' => $request->category,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('appposts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(AppPost $apppost)
    {
        // Delete the apppost
        $apppost->delete();
        return redirect()->route('appposts.index')->with('success', 'Post deleted successfully');
    }
}
