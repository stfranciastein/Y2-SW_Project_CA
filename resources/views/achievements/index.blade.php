@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4 text-uppercase fs-3">Unlocked Achievements</h3>

    @php
        $unlocked = auth()->user()->achievements()->latest()->get();
        $all = \App\Models\Achievement::all();
        $locked = $all->diff($unlocked);
    @endphp

    @if ($unlocked->isEmpty())
        <p class="text-muted">You haven't unlocked any achievements yet.</p>
    @else
        <div class="row">
            @foreach ($unlocked as $achievement)
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-center border rounded p-3 shadow-sm h-100">
                    <img src="{{ $achievement->image_url ? asset('storage/' . $achievement->image_url) : asset('images/assets/logo_black.png') }}"
                    alt="{{ $achievement->name }}"
                    style="width: 50px; height: 50px; object-fit: cover;" class="me-3 rounded">
                        <div>
                            <h5 class="mb-1">{{ $achievement->name }}</h5>
                            <p class="mb-1 text-muted small">{{ $achievement->description }}</p>
                            @php
                                $categoryColors = [
                                    'food' => 'bg-success',
                                    'water' => 'bg-primary',
                                    'energy' => 'bg-warning',
                                    'land' => 'bg-info',
                                    'air' => 'bg-secondary',
                                    'sea' => 'bg-danger',
                                    'general' => 'bg-dark',
                                ];
                                $badgeColor = $categoryColors[$achievement->category] ?? 'bg-secondary';
                            @endphp
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge {{ $badgeColor }}">{{ ucfirst($achievement->category) }}</span>
                                <span class="badge bg-success">Unlocked on {{ $achievement->pivot->created_at->format('M j, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <h3 class="mt-5 mb-4 text-uppercase fs-3">Locked Achievements</h3>
    @if ($locked->isEmpty())
        <p class="text-muted">You've unlocked all achievements. Impressive!</p>
    @else
        <div class="row">
            @foreach ($locked as $achievement)
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-center border border-light-subtle rounded p-3 shadow-sm h-100 bg-light">
                        <img src="{{ $achievement->image_url ? asset('storage/' . $achievement->image_url) : asset('images/assets/logo_black.png') }}"
                            alt="{{ $achievement->name }}"
                            style="width: 50px; height: 50px; object-fit: cover; filter: grayscale(100%) brightness(70%);"
                            class="me-3 rounded">
                        <div>
                            <h5 class="mb-1 text-muted">{{ $achievement->name }}</h5>
                            <p class="mb-1 text-muted small">{{ $achievement->description }}</p>
                            <span class="badge bg-secondary">Locked</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
