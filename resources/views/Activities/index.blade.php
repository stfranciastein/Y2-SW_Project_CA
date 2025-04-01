@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="activityTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $activeTab === 'general' ? 'active' : '' }}" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $activeTab === 'favourited' ? 'active' : '' }}" id="favourited-tab" data-bs-toggle="tab" href="#favourited" role="tab" aria-controls="favourited" aria-selected="false">Favourited</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $activeTab === 'completed' ? 'active' : '' }}" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4" id="activityTabsContent">
        <!-- General Activities Tab -->
        <div class="tab-pane fade {{ $activeTab === 'general' ? 'show active' : '' }}" id="general" role="tabpanel" aria-labelledby="general-tab">
    <div id="category-selector" class="row">
        @php
            $categories = ['all' => 'All Activities', 'Energy' => 'Energy', 'food' => 'Food', 'waste' => 'Waste', 'land' => 'Land', 'air' => 'Air', 'sea' => 'Sea'];
        @endphp

        @foreach($categories as $key => $label)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm clickable" onclick="showCategory('{{ $key }}')">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $label }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @foreach($categories as $key => $label)
        <div class="row category-list" id="category-{{ $key }}" style="display: none;">
            <div class="col-12 mb-3">
                <input type="text" class="form-control category-search" data-category="{{ $key }}" placeholder="Search activities...">
            </div>

            @php
                $filtered = $key === 'all'
                    ? $activities->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))
                    : $activities->where('category', $key)->whereNotIn('id', auth()->user()->completedActivities->pluck('id'));
            @endphp

            @if($filtered->isEmpty())
                <p class="text-muted text-center">No activities found in this category.</p>
            @endif

            <!-- This is a back button -->
            <div class="mb-3">
                <button onclick="showCategory('back')" class="btn btn-link text-decoration-none">
                    <i class="fas fa-arrow-left"></i>
                </button>
            </div>
            @foreach($filtered as $activity)
            <div class="col-md-6 mb-4 activity-card" data-name="{{ strtolower($activity->name) }}">
                <x-activity-card :activity="$activity" />
            </div>
            @endforeach
        </div>
    @endforeach
</div>


        <!-- Favourited Activities Tab -->
        <div class="tab-pane fade {{ $activeTab === 'favourited' ? 'show active' : '' }}" id="favourited" role="tabpanel" aria-labelledby="favourited-tab">
            <div class="row">
                @foreach($favouritedActivities as $activity)
                    <div class="col-md-6 mb-4">
                        <x-activity-card :activity="$activity" />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Completed Activities Tab -->
        <div class="tab-pane fade {{ $activeTab === 'completed' ? 'show active' : '' }}" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <div class="row">
                @foreach($completedActivities as $activity)
                    <div class="col-md-6 mb-4">
                        <x-activity-card :activity="$activity" />
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
<script>
    function showCategory(category) {
        const selector = document.getElementById('category-selector');
        const lists = document.querySelectorAll('.category-list');
        const tabs = document.querySelector('.nav-tabs');

        if (category === 'back') {
            selector.style.display = 'flex';
            lists.forEach(el => el.style.display = 'none');
            if (tabs) tabs.style.display = 'flex';
            return;
        }

        selector.style.display = 'none';
        if (tabs) tabs.style.display = 'none';
        lists.forEach(el => el.style.display = 'none');

        const categoryEl = document.getElementById('category-' + category);
        if (categoryEl) {
            categoryEl.style.display = 'flex';
        }
    }
</script>
<script>
    document.querySelectorAll('.category-search').forEach(input => {
        input.addEventListener('input', function () {
            const category = this.dataset.category;
            const query = this.value.toLowerCase();
            const container = document.getElementById('category-' + category);

            container.querySelectorAll('.activity-card').forEach(card => {
                const name = card.dataset.name;
                card.style.display = name.includes(query) ? 'block' : 'none';
            });
        });
    });
</script>




@endsection
