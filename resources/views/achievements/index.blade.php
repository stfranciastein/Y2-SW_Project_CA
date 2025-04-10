@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Unlocked Achievements</h2>

    @php
        $achievements = auth()->user()->achievements()->latest()->get();
    @endphp

    @if ($achievements->isEmpty())
        <p class="text-muted">You haven't unlocked any achievements yet.</p>
    @else
        <div class="row">
            @foreach ($achievements as $achievement)
                <div class="col-md-4 mb-4">
                    <div class="card border-success h-100">
                        @if($achievement->image_url)
                            <img src="{{ asset('storage/' . $achievement->image_url) }}" class="card-img-top" alt="{{ $achievement->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $achievement->name }}</h5>
                            <p class="card-text">{{ $achievement->description }}</p>
                            <span class="badge bg-success">Unlocked</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
