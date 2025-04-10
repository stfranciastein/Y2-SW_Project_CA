@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Button will only show if you're an admin -->
    @if($role === 'admin' || $role === 'moderator')
        <a href="{{ route('appposts.edit', $apppost->id) }}" class="btn btn-warning mb-3">
            <i class="fas fa-edit"></i> Edit This Post
        </a>
    @endif

    <form method="POST" action="{{ isset($apppost) ? route('appposts.update', $apppost->id) : route('appposts.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($apppost))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control"
                value="{{ old('title', $apppost->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $apppost->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $apppost->content ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control">
                @foreach(['news', 'event', 'announcement'] as $category)
                    <option value="{{ $category }}"
                        {{ (old('category', $apppost->category ?? '') === $category) ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image</label>
            <input type="file" name="image_url" id="image_url" class="form-control">
            @if(isset($apppost) && $apppost->image_url)
                <img src="{{ asset('storage/' . $apppost->image_url) }}" alt="Post Image" class="img-fluid mt-2" style="max-height: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($apppost) ? 'Update Post' : 'Create Post' }}
        </button>
    </form>
</div>
@endsection
