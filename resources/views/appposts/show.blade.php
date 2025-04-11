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
            <div class="justify-content-center">
                <div class="text-center">
                    <p class="text-capitalize fs-5">{{ $apppost->category }}</p>
                    <h2 class="card-title pb-1 fs-1">{{ $apppost->title }}</h2>
                    @if ($apppost->description)
                        <p class="lead fst-italic">{{ $apppost->description }}</p>
                    @endif
                    <div class="pb-2 border-bottom">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <img src="{{ asset($apppost->user->image_url) }}"
                                alt="{{ $apppost->user->name }}"
                                class="rounded-circle"
                                style="width: 25px; height: 25px; object-fit: cover;">
                            <span class="text-black text-uppercase fw-bold">{{ $apppost->user->name }}</span>
                            <span class="text-black">&middot;</span>
                            <span class="text-black text-uppercase fw-bold">{{ $apppost->created_at->format('F j, Y') }}</span>
                        </div>

                        <div class="d-flex justify-content-center gap-3 mt-3 mb-4">
                            <i class="fab fa-facebook text-dark fs-3"></i>
                            <i class="fab fa-linkedin text-dark fs-3"></i>
                            <i class="fab fa-instagram text-dark fs-3"></i>
                        </div>
                    </div>
                </div>
                    <!-- Button to edit and delete will only show if you're an admin -->
                    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'moderator']))
                        <div class="d-flex gap-2 justify-content-center my-3">
                            <a href="{{ route('appposts.edit', $apppost->id) }}" class="btn btn-dark rounded-pill px-4">
                                <i class="fas fa-pen me-2"></i> Edit
                            </a>

                            <form action="{{ route('appposts.destroy', $apppost->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn rounded-pill px-4 text-dark" style="border: none;"
                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="fas fa-trash me-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    @endif            
            <div class="mt-4 pt-2 ">
                <p class="first-letter-large">
                    {!! nl2br(e($apppost->content)) !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
