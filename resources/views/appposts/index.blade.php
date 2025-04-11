@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Newsletter</h2>
        @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'moderator']))
            <a href="{{ route('appposts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Create Post
            </a>
        @endif
    </div>

    <!-- Hidden Tabs (no UI nav links) -->
    <div class="tab-content mt-4" id="postTabsContent">
        <!-- Toggle Area -->
        <div id="main-updates-view">

<!-- Announcement Circles -->
<div class="announcement-scroll d-flex gap-2 mb-4" id="announcementScroll">
    @foreach($appposts->where('category', 'announcement')->take(10) as $announcement)
        <div class="text-center flex-shrink-0" data-bs-toggle="modal" data-bs-target="#announcementModal{{ $announcement->id }}">
            <div class="rounded-circle border p-2" style="width: 100px; height: 100px; overflow: hidden;">
                @if($announcement->image_url)
                    <img src="{{ asset($announcement->image_url) }}"
                        class="img-fluid rounded-circle"
                        style="object-fit: cover; width: 100%; height: 100%;">
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 w-100 bg-light rounded-circle">
                        <small>{{ \Illuminate\Support\Str::limit($announcement->title, 2, '') }}</small>
                    </div>
                @endif
            </div>
            <small class="d-block mt-1 text-muted" style="font-size: 0.75rem;">
                {{ \Illuminate\Support\Str::limit($announcement->title, 10) }}
            </small>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="announcementModal{{ $announcement->id }}" tabindex="-1" aria-labelledby="announcementModalLabel{{ $announcement->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="announcementModalLabel{{ $announcement->id }}">{{ $announcement->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0">
                        <p class="text-muted mb-2">By {{ $announcement->user->name }} · {{ $announcement->created_at->format('M j, Y') }}</p>
                        <p>{{ $announcement->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


            <!-- Latest News Post -->
            @if($latestNews)
                <div class="mb-4">
                    <x-app-post-preview :apppost="$latestNews" />
                </div>
            @endif

            @if($latestEvent = $appposts->where('category', 'event')->first())
                <div class="card mb-3 border-0 text-white position-relative overflow-hidden" style="height: 200px;">
                    <!-- Background Image -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="
                        background-image: url('{{ $latestEvent->image_url ? asset($latestEvent->image_url) : asset('images/assets/placeholder.png') }}');
                        background-size: cover;
                        background-position: center;
                        z-index: 1;">
                    </div>

                    <!-- Black Overlay -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="
                        background-color: rgba(0, 0, 0, 0.75);
                        z-index: 2;
                    "></div>

                    <!-- Content -->
                    <div class="card-body position-relative z-3">
                        <h5 class="card-title">{{ $latestEvent->title }}</h5>
                        <p class="card-text">By {{ $latestEvent->user->name }}</p>
                        <a href="#" class="text-white text-decoration-underline" onclick="toggleEventsView(true)">
                            View All Events <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endif


            <!-- Remaining News -->
            <div class="row">
                @foreach($remainingNews as $apppost)
                    <div class="col-md-6 mb-3">
                        <x-app-post-preview :apppost="$apppost" />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Events Tab Full View -->
        <div id="events-view" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">All Events</h4>
                <button class="btn btn-outline-secondary" onclick="toggleEventsView(false)">
                    <i class="fas fa-arrow-left"></i> Back
                </button>
            </div>
            <div class="row">
                @foreach($appposts->where('category', 'event') as $apppost)
                    <div class="col-md-6 mb-3">
                        <x-app-post-preview :apppost="$apppost" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function toggleEventsView(showEvents) {
        document.getElementById('main-updates-view').style.display = showEvents ? 'none' : 'block';
        document.getElementById('events-view').style.display = showEvents ? 'block' : 'none';
    }
</script>
<script src="{{ asset('js/dragtuah.js') }}"></script> <!-- This is so the achievement cards are draggable -->
<script>
    let modals = @json($appposts->where('category', 'announcement')->pluck('id')->values());

    modals.forEach((id, index) => {
        const modalEl = document.getElementById(`announcementModal${id}`);
        let startX = 0;

        modalEl?.addEventListener('touchstart', (e) => {
            startX = e.changedTouches[0].screenX;
        });

        modalEl?.addEventListener('touchend', (e) => {
            const endX = e.changedTouches[0].screenX;
            const diffX = endX - startX;

            if (Math.abs(diffX) > 50) {
                let nextIndex = index + (diffX < 0 ? 1 : -1);
                if (nextIndex >= 0 && nextIndex < modals.length) {
                    const currentModal = bootstrap.Modal.getInstance(modalEl);
                    currentModal.hide();
                    const nextModal = new bootstrap.Modal(document.getElementById(`announcementModal${modals[nextIndex]}`));
                    setTimeout(() => nextModal.show(), 300); // wait for transition
                }
            }
        });
    });
</script>

@endsection
