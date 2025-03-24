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

            <!-- Add more data as needed -->
        </div>
    </div>
</div>
@endsection
