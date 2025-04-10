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
                    <a href="{{ route('appposts.show', $announcement->id) }}" class="text-decoration-none text-center flex-shrink-0">
                        <div class="rounded-circle border p-2" style="width: 60px; height: 60px; overflow: hidden;">
                            @if($announcement->image_url)
                                <img src="{{ asset('storage/' . $announcement->image_url) }}" class="img-fluid rounded-circle" style="object-fit: cover; width: 100%; height: 100%;">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 w-100 bg-light rounded-circle">
                                    <small>{{ \Illuminate\Support\Str::limit($announcement->title, 2, '') }}</small>
                                </div>
                            @endif
                        </div>
                        <small class="d-block mt-1 text-muted" style="font-size: 0.75rem;">{{ \Illuminate\Support\Str::limit($announcement->title, 10) }}</small>
                    </a>
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
                        background-image: url('{{ asset('storage/' . $latestEvent->image_url) }}');
                        background-size: cover;
                        background-position: center;
                        z-index: 1;
                    "></div>

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
@endsection
