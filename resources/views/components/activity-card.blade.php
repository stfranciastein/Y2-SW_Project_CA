<a href="{{ route('activities.show', $activity->id) }}" class="text-decoration-none text-dark">
    <div class="card border-0 h-100 shadow-sm">
        @if ($activity->image_url)
            <img src="{{ asset('storage/' . $activity->image_url) }}" class="card-img-top" alt="{{ $activity->title }}">
        @endif
        <div class="card-body">
            <h5 class="card-name fw-bold fs-6">{{ $activity->name }}</h5>
            <span class="badge bg-secondary">Impact: {{ $activity->impact_points }}</span>

            @php
                // Define difficulty color based on the difficulty level
                $difficultyClass = 'bg-secondary'; // Default class
                if ($activity->difficulty === 'easy') {
                    $difficultyClass = 'bg-success'; // Green
                } elseif ($activity->difficulty === 'medium') {
                    $difficultyClass = 'bg-warning'; // Orange
                } elseif ($activity->difficulty === 'hard') {
                    $difficultyClass = 'bg-danger'; // Red
                }
            @endphp

            <span class="badge {{ $difficultyClass }}">Difficulty: {{ ucfirst($activity->difficulty) }}</span>
        </div>
    </div>
</a>
