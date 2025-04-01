@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('appposts.index') }}" class="btn btn-outline-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Back to Posts
    </a>

    <div class="card">
        @if ($apppost->image_url)
            <img src="{{ asset('storage/' . $apppost->image_url) }}" class="card-img-top" alt="{{ $apppost->title }}">
        @endif
        <div class="card-body">
            <p class="text-muted">{{ ucfirst($apppost->category) }}</p>
            <h2 class="card-title pb-1">{{ $apppost->title }}</h2>
            <p class="text-muted pb-1">By {{ $apppost->user->name }}</p>
            @if ($apppost->description)
                <p class="lead">{{ $apppost->description }}</p>
            @endif
            <div class="mt-4">
                {!! nl2br(e($apppost->content)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
