<a href="{{ route('activities.show', $activity->id) }}" class="text-decoration-none text-dark">
    <div class="card h-100">
        @if ($activity->image_url)
            <img src="{{ asset('storage/' . $activity->image_url) }}" class="card-img-top" alt="{{ $activity->title }}">
        @endif
        <div class="card-body">
            <h5 class="card-name">{{ $activity->name }}</h5>
            <span class="badge bg-secondary">Impact: {{ $activity->impact_points }}</span>
            <span class="badge bg-info">Difficulty: {{ $activity->difficulty }}</span>
        </div>
    </div>
</a>
