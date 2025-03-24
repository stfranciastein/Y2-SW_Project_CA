@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        @if ($activity->image_url)
            <img src="{{ asset('storage/' . $activity->image_url) }}" class="card-img-top" alt="{{ $activity->title }}">
        @endif
        <div class="card-body">
            <h2 class="card-name">{{ $activity->name }}</h2>
            <p class="card-text">{{ $activity->description }}</p>
            <p><strong>Impact Points:</strong> {{ $activity->impact_points }}</p>
            <p><strong>Difficulty:</strong> {{ $activity->difficulty }}</p>

            @auth
                <form method="POST" action="{{ auth()->user()->favouritedActivities->contains($activity->id)
                    ? route('activities.unfavourite', $activity->id)
                    : route('activities.favourite', $activity->id) }}">
                    @csrf
                    @if (auth()->user()->favouritedActivities->contains($activity->id))
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Unfavourite</button>
                    @else
                        <button type="submit" class="btn btn-dark">Favourite</button>
                    @endif
                </form>
            @endauth
        </div>
    </div>
</div>


@endsection
