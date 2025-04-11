@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('activities.index') }}" class="btn btn-light border-0 bg-none">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>
    </div>

    <div class="card p-4">
        <h2 class="fw-bold mb-4">Create a New Activity</h2>

        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="name" name="name" placeholder="Activity Name" required>
                <label for="name">Activity Name</label>
            </div>

            <!-- Description -->
            <div class="form-floating mb-4">
                <textarea class="form-control" id="description" name="description" placeholder="Description" style="height: 150px" required></textarea>
                <label for="description">Description</label>
            </div>

            <!-- Category -->
            <div class="form-floating mb-4">
                <select class="form-select" id="category" name="category" required>
                    <option value="energy">Energy</option>
                    <option value="food">Food</option>
                    <option value="waste">Waste</option>
                    <option value="land">Land</option>
                    <option value="air">Air</option>
                    <option value="sea">Sea</option>
                </select>
                <label for="category">Category</label>
            </div>

            <!-- Difficulty -->
            <div class="form-floating mb-4">
                <select class="form-select" id="difficulty" name="difficulty" required>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                <label for="difficulty">Difficulty</label>
            </div>

            <!-- Impact Points -->
            <div class="form-floating mb-4">
                <input type="number" class="form-control" id="impact_points" name="impact_points" value="0" min="0" required>
                <label for="impact_points">Impact Points</label>
            </div>

            <!-- Emissions Reductions -->
            <div class="row g-3 mb-4">
                @foreach(['food', 'waste', 'energy', 'land', 'air', 'sea'] as $type)
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="reduction_{{ $type }}" name="reduction_{{ $type }}" value="0" min="0" required>
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
                <button type="submit" class="btn btn-dark rounded-pill py-2">Create Activity</button>
            </div>
        </form>
    </div>
</div>
@endsection
