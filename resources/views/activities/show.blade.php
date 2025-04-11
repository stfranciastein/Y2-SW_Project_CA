@extends('layouts.app')
@section('content')
@php use Illuminate\Support\Str; @endphp
<div class="container">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="javascript:history.back()" class="btn btn-light rounded-pill px-4 border-0"
        style="background-color: #f8f9fa; color: black; box-shadow: none; transition: none;">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>
    </div>


    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <!-- 2 Images because I couldn't figure out how to use bootstrap properly for this --> 
        <img src="{{ Str::startsWith($activity->image_url, ['http://', 'https://']) ? $activity->image_url : asset($activity->image_url ?? 'images/placeholder.png') }}" class="card-img-top object-fit-cover d-none d-md-block" alt="{{ $activity->title }}" style="height: 300px;">
        <img src="{{ Str::startsWith($activity->image_url, ['http://', 'https://']) ? $activity->image_url : asset($activity->image_url ?? 'images/placeholder.png') }}" class="card-img-top object-fit-cover d-sm-none" alt="{{ $activity->title }}">


        <div class="card-body px-4 py-4">
            <div class="text-center">
                <h1 class="h2 mb-3 fs-1" style="font-family: 'Tilt Warp', cursive;">{{ $activity->name }}</h1>
                <div class="d-flex flex-wrap gap-2 text-muted mb-3 justify-content-center">
                    <span class="text-capitalize">{{ $activity->impact_points }} Impact Points</span>
                    <span>&middot;</span>
                    <span class="text-capitalize">{{ $activity->category }}</span>
                    <span>&middot;</span>
                    <span class="text-capitalize">{{ $activity->difficulty }}</span>
                </div>

            </div>
            @auth
                @if (!auth()->user()->completedActivities->contains($activity->id))
                    <form method="POST" action="{{ auth()->user()->favouritedActivities->contains($activity->id)
                        ? route('activities.unfavourite', $activity->id)
                        : route('activities.favourite', $activity->id) }}">
                        @csrf
                        @if (auth()->user()->favouritedActivities->contains($activity->id))
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100 rounded-pill mb-3">
                                <i class="fas fa-heart-broken me-2"></i> Remove from Favourites
                            </button>
                        @else
                            <button type="submit" class="btn btn-danger w-100 rounded-pill mb-3">
                                <i class="fas fa-heart me-2"></i> Add to Favourites
                            </button>
                        @endif
                    </form>
                @endif

                <form method="POST" action="{{ auth()->user()->completedActivities->contains($activity->id)
                    ? route('activities.uncompleted', $activity->id)
                    : route('activities.completed', $activity->id) }}">
                    @csrf
                    @if (auth()->user()->completedActivities->contains($activity->id))
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100 rounded-pill">
                            <i class="fas fa-times-circle me-2"></i> Unmark as Completed
                        </button>
                    @else
                        <button type="submit" class="btn btn-success w-100 rounded-pill">
                            <i class="fas fa-check-circle me-2"></i> Mark as Completed
                        </button>
                    @endif
                </form>
            @endauth

            <hr class="my-4">

            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'moderator')
                <div class="d-flex gap-2 justify-content-center my-3">
                    <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-dark rounded- px-4">
                        <i class="fas fa-pen me-2"></i> Edit
                    </a>

                    <form method="POST" action="{{ route('activities.destroy', $activity->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn rounded-pill px-4 text-dark" style="border: none;"
                            onclick="return confirm('Are you sure you want to delete this activity?')">
                            <i class="fas fa-trash me-2"></i> Delete
                        </button>
                    </form>
                </div>
            @endif


            <p class="text-dark">{{ $activity->description }}</p>
        </div>
    </div>
    @if($relatedActivities->count())
    <div class="mt-5">
        <h3 class="mb-4 fw-bold">Related Activities</h3>
        <div class="row">
            @foreach($relatedActivities as $related)
                <div class="col-md-6 col-lg-3 mb-4 activity-card"
                     data-name="{{ strtolower($related->name) }}"
                     data-difficulty="{{ strtolower($related->difficulty) }}">
                    <x-activity-card :activity="$related" />
                </div>
            @endforeach
        </div>
    </div>
@endif

</div>
@endsection
