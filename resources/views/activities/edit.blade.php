@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('activities.index') }}" class="btn btn-light border-0 shadow-sm">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>
    </div>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Edit Activity</h2>

        <!-- Image Preview -->
        @php use Illuminate\Support\Str; @endphp
        @if($activity->image_url)
            <img src="{{ Str::startsWith($activity->image_url, ['http://', 'https://']) ? $activity->image_url : asset($activity->image_url) }}"
                 alt="Activity Image"
                 class="img-fluid rounded mb-4"
                 style="max-height: 300px; object-fit: cover;">
        @endif

        <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="name" name="name" value="{{ $activity->name }}" placeholder="Activity Name" required>
                <label for="name">Activity Name</label>
            </div>

            <!-- Description -->
            <div class="form-floating mb-4">
                <textarea class="form-control" id="description" name="description" style="height: 150px" placeholder="Description" required>{{ $activity->description }}</textarea>
                <label for="description">Description</label>
            </div>

            <!-- Category -->
            <div class="form-floating mb-4">
                <select class="form-select" id="category" name="category" required>
                    @foreach(['energy', 'food', 'waste', 'land', 'air', 'sea'] as $category)
                        <option value="{{ $category }}" {{ $activity->category === $category ? 'selected' : '' }}>{{ ucfirst($category) }}</option>
                    @endforeach
                </select>
                <label for="category">Category</label>
            </div>

            <!-- Difficulty -->
            <div class="form-floating mb-4">
                <select class="form-select" id="difficulty" name="difficulty" required>
                    @foreach(['easy', 'medium', 'hard'] as $difficulty)
                        <option value="{{ $difficulty }}" {{ $activity->difficulty === $difficulty ? 'selected' : '' }}>{{ ucfirst($difficulty) }}</option>
                    @endforeach
                </select>
                <label for="difficulty">Difficulty</label>
            </div>

            <!-- Impact Points -->
            <div class="form-floating mb-4">
                <input type="number" class="form-control" id="impact_points" name="impact_points" value="{{ $activity->impact_points }}" min="0" required>
                <label for="impact_points">Impact Points</label>
            </div>

            <!-- Emissions Reductions -->
            <div class="row g-3 mb-4">
                @foreach(['food', 'waste', 'energy', 'land', 'air', 'sea'] as $type)
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="reduction_{{ $type }}" name="reduction_{{ $type }}" value="{{ $activity['reduction_' . $type] ?? 0 }}" min="0" required>
                            <label for="reduction_{{ $type }}">Reduction ({{ ucfirst($type) }})</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Image Upload -->
            <label class="form-label">Activity Image</label>
            <div class="row g-2 mb-2">
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

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark rounded-pill py-2">Update Activity</button>
            </div>
        </form>
    </div>
</div>
@endsection
