@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="javascript:history.back()" class="btn btn-light">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <div class="card">
        @if ($activity->image_url)
            <img src="{{ asset('storage/' . $activity->image_url) }}" class="card-img-top" alt="{{ $activity->title }}">
        @endif
        <div class="card-body">
            <p class="card-text">{{ $activity->category }}</p>
            <h2 class="card-name">{{ $activity->name }}</h2>
            <ul class="d-flex gap-5 p-0">
            <p><strong>Impact Points:</strong> {{ $activity->impact_points }}</p>
            <p><strong>Difficulty:</strong><span class="text-capitalize"> {{ $activity->difficulty }} </span></p>
            </ul>

            @auth
                @if (!auth()->user()->completedActivities->contains($activity->id)) <!-- Only show favourite button if not completed -->
                    <div class="d-flex justify-content-center w-100">
                        <form method="POST" action="{{ auth()->user()->favouritedActivities->contains($activity->id)
                            ? route('activities.unfavourite', $activity->id)
                            : route('activities.favourite', $activity->id) }}" class="w-100">
                            @csrf
                            @if (auth()->user()->favouritedActivities->contains($activity->id))
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100">Remove from Favourites</button>
                            @else
                                <button type="submit" class="btn btn-dark w-100">Add to Favourites</button>
                            @endif
                        </form>
                    </div>
                @endif
            @endauth

            @auth
                <div class="d-flex justify-content-center w-100 mt-3">
                    <form method="POST" action="{{ auth()->user()->completedActivities->contains($activity->id)
                        ? route('activities.uncompleted', $activity->id)
                        : route('activities.completed', $activity->id) }}" class="w-100">
                        @csrf
                        @if (auth()->user()->completedActivities->contains($activity->id))
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">Unmark as Completed</button>
                        @else
                            <button type="submit" class="btn btn-success w-100">Mark as Completed</button>
                        @endif
                    </form>
                </div>
            @endauth

            <p class="card-text pt-3">{{ $activity->description }}</p>

        </div>
    </div>
</div>
@endsection
