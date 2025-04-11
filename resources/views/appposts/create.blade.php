@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('appposts.index') }}" class="btn btn-light border-0 px-4">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>
    </div>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">{{ isset($apppost) ? 'Edit Post' : 'Create a New Post' }}</h2>

        @if(isset($apppost) && $apppost->image_url)
            <img src="{{ Str::startsWith($apppost->image_url, ['http://', 'https://']) ? $apppost->image_url : asset($apppost->image_url ?? 'images/placeholder.png') }}" 
                 class="img-fluid rounded-4 mb-4" 
                 style="max-height: 200px; object-fit: cover;">
        @endif

        <form method="POST" action="{{ isset($apppost) ? route('appposts.update', $apppost->id) : route('appposts.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($apppost))
                @method('PUT')
            @endif

            <div class="form-floating mb-4">
                <input type="text" name="title" id="title" class="form-control" placeholder="Post Title" value="{{ old('title', $apppost->title ?? '') }}" required>
                <label for="title">Post Title</label>
            </div>

            <div class="form-floating mb-4">
                <textarea name="description" id="description" class="form-control" placeholder="Short Description" style="height: 100px">{{ old('description', $apppost->description ?? '') }}</textarea>
                <label for="description">Description</label>
            </div>

            <div class="form-floating mb-4">
                <textarea name="content" id="content" class="form-control" placeholder="Post Content" style="height: 200px" required>{{ old('content', $apppost->content ?? '') }}</textarea>
                <label for="content">Content</label>
            </div>

            <div class="form-floating mb-4">
                <select name="category" id="category" class="form-select" required>
                    @foreach(['news', 'event', 'announcement'] as $category)
                        <option value="{{ $category }}" {{ (old('category', $apppost->category ?? '') === $category) ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
                <label for="category">Category</label>
            </div>

            <!-- Image Upload -->
            <label class="form-label">Post Image</label>
            <div class="row g-2 mb-4">
                <div class="col-md-6">
                    <input type="file" class="form-control" name="image_upload" accept="image/*">
                </div>
                <div class="col-md-1 d-flex align-items-center justify-content-center">
                    <span class="text-muted">or</span>
                </div>
                <div class="col-md-5">
                    <input type="url" class="form-control" name="image_url" placeholder="Paste image URL">
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-dark rounded-pill px-4">
                    {{ isset($apppost) ? 'Update Post' : 'Create Post' }}
                </button>
                <a href="{{ route('appposts.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
