<a href="{{ route('appposts.show', $apppost->id) }}" class="text-decoration-none text-dark">
    <div class="card border-0 border-bottom rounded-0 mb-3">
        <img src="{{ $apppost->image_url ? asset($apppost->image_url) : asset('images/assets/placeholder.png') }}"
             class="card-img-top object-fit-cover w-100"
             alt="{{ $apppost->title }}"
             style="height: 250px;">
        <div class="card-body">
            <h5 class="card-title">{{ $apppost->title }}</h5>
            <p class="card-text text-muted">By {{ $apppost->user->name }}</p>
        </div>
    </div>
</a>
