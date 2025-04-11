@php 
use Illuminate\Support\Str;
@endphp
<a href="{{ route('activities.show', $activity->id) }}" class="text-decoration-none text-dark">
    <div class="card border-0 h-100 shadow-sm">
    <img src="{{ Str::startsWith($activity->image_url, ['http://', 'https://']) ? $activity->image_url : asset($activity->image_url ?? 'images/placeholder.png') }}"
     class="card-img-top object-fit-cover"
     alt="{{ $activity->title }}"
     style="height: 100px; width: 100%; object-fit: cover;">

        <div class="card-body">
            <h6 class="card-name h6">{{ $activity->name }}</h6>
            <span class="badge bg-secondary">{{ $activity->impact_points }} Impact Points</span>

            @php
                $difficultyClass = match($activity->difficulty) {
                    'easy' => 'bg-success',
                    'medium' => 'bg-warning',
                    'hard' => 'bg-danger',
                    default => 'bg-secondary',
                };

                $categoryClass = match($activity->category) {
                    'food' => 'badge-food',
                    'waste' => 'badge-waste',
                    'energy' => 'badge-energy',
                    'air' => 'badge-air',
                    'land' => 'badge-land',
                    'sea' => 'badge-sea',
                    default => 'bg-secondary',
                };
            @endphp

            <span class="badge {{ $difficultyClass }}">{{ ucfirst($activity->difficulty) }}</span>
            <span class="badge {{ $categoryClass }}">{{ ucfirst($activity->category) }}</span>
        </div>
    </div>
</a>
