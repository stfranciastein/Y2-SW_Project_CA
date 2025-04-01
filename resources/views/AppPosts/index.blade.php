@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Updates</h2>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="postTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $activeTab === 'news' ? 'active' : '' }}" id="news-tab" data-bs-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="true">News</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $activeTab === 'event' ? 'active' : '' }}" id="event-tab" data-bs-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="false">Events</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $activeTab === 'announcement' ? 'active' : '' }}" id="announcement-tab" data-bs-toggle="tab" href="#announcement" role="tab" aria-controls="announcement" aria-selected="false">Announcements</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4" id="postTabsContent">
        <!-- News Tab -->
        <div class="tab-pane fade {{ $activeTab === 'news' ? 'show active' : '' }}" id="news" role="tabpanel" aria-labelledby="news-tab">
            @foreach($appposts->where('category', 'news') as $apppost)
                <x-app-post-preview :apppost="$apppost" />
            @endforeach
        </div>

        <!-- Events Tab -->
        <div class="tab-pane fade {{ $activeTab === 'event' ? 'show active' : '' }}" id="event" role="tabpanel" aria-labelledby="event-tab">
            @foreach($appposts->where('category', 'event') as $apppost)
                <x-app-post-preview :apppost="$apppost" />
            @endforeach
        </div>

        <!-- Announcements Tab -->
        <div class="tab-pane fade {{ $activeTab === 'announcement' ? 'show active' : '' }}" id="announcement" role="tabpanel" aria-labelledby="announcement-tab">
            @foreach($appposts->where('category', 'announcement') as $apppost)
                <x-app-post-preview :apppost="$apppost" />
            @endforeach
        </div>
    </div>
</div>
@endsection
