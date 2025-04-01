<a href="{{ route('appposts.show', $apppost->id) }}" class="text-decoration-none text-dark">
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $apppost->title }}</h5>
        <p class="card-text text-muted">By {{ $apppost->user->name }}</p>
    </div>
</div>
</a>