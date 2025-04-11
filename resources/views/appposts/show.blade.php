@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Back Button -->
    <a href="{{ route('appposts.index') }}" class="btn border-0 mb-3">
        <i class="fas fa-arrow-left"></i>
    </a>

    <!-- Actual Card --> 
    <div class="card border-0">
        <img src="{{ $apppost->image_url ? asset($apppost->image_url) : asset('images/placeholder.png') }}"
        class="card-img-top object-fit-cover"
        alt="{{ $apppost->title }}"
        style="height: 400px">
        <div class="card-body">
            <div class="text-center justify-content-center">
                <h2 class="card-title pb-1 fs-1">{{ $apppost->title }}</h2>
                @if ($apppost->description)
                    <p class="lead fst-italic">{{ $apppost->description }}</p>
                @endif
                <div class="d-flex justify-content-center gap-2 pb-2 border-bottom">
                    <p class="text-muted">{{ ucfirst($apppost->category) }}</p>
                    <p class="text-muted pb-1">&middot;</p>
                    <p class="text-muted pb-1">By {{ $apppost->user->name }}</p>
                    <p class="text-muted pb-1">&middot;</p>
                    <p class="text-muted pb-1">{{ $apppost->created_at->format('F j, Y') }}</p>
                </div>
                    <!-- Button to edit and delete will only show if you're an admin -->
                    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'moderator']))
                    <div class="mt-3">
                        <h3>Moderation Actions</h3>
                        <a href="{{ route('appposts.edit', $apppost->id) }}" class="btn btn-warning mb-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <!-- Deletes this post -->
                        <form action="{{ route('appposts.destroy', $apppost->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-3" onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </div>
                    @endif
            </div>
            
            <div class="mt-4 pt-2">
                <p class="first-letter-large">
                    {!! nl2br(e($apppost->content)) !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
