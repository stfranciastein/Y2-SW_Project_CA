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
                    $categories = ['all' => 'All Activities', 'energy' => 'Energy', 'food' => 'Food', 'waste' => 'Waste', 'land' => 'Land', 'air' => 'Air', 'sea' => 'Sea'];
                @endphp

                @foreach($categories as $key => $label)
                    @php
                        $count = $key === 'all'
                            ? $activities->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))->count()
                            : $activities->where('category', $key)->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))->count();
                    @endphp
                    @if($key === 'all')
                    <div class="col-12 col-md-6 mb-4">
                        <div class="position-relative rounded shadow-sm clickable w-100"
                            onclick="showCategory('{{ $key }}')"
                            style="
                                aspect-ratio: 1 / 1;
                                background-image: url('{{ asset('images/location.png') }}');
                                background-size: cover;
                                background-position: center;
                                overflow: hidden;">
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.6); z-index: 1;"></div>
                            <div class="position-relative z-2 d-flex flex-column justify-content-center align-items-center h-100 text-white px-2 text-center">
                                <h3 class="fw-bold">All Activities</h3>
                                <p class="mb-1 fst-italic">"You're never too small to make a difference."</p>
                                <p class="mb-0">{{ $count }} activities</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- The background for this will use a url + key cause I didn't want to make another stupid table -->
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="position-relative rounded shadow-sm clickable"
                            onclick="showCategory('{{ $key }}')"
                            style="
                                width: 100%;
                                aspect-ratio: 1 / 1;
                                background-image: url('{{ asset('images/assets/activitybackgrounds/' . $key . '.jpg') }}');
                                background-size: cover;
                                background-position: center;
                                overflow: hidden;">
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.55); z-index: 1;"></div>
                            <div class="position-relative z-2 d-flex flex-column justify-content-center align-items-center h-100 text-white px-2 text-center">
                                <i class="fas {{ match($key) {
                                    'energy' => 'fa-bolt',
                                    'food' => 'fa-utensils',
                                    'waste' => 'fa-trash',
                                    'land' => 'fa-tree',
                                    'air' => 'fa-wind',
                                    'sea' => 'fa-water',
                                    default => 'fa-leaf',
                                } }} fa-2x mb-2"></i>
                                <h6 class="fw-bold mb-1 text-white">{{ $label }}</h6>
                                <small>{{ $count }} activities</small>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            @foreach($categories as $key => $label)
                <div class="row category-list" id="category-{{ $key }}" style="display: none;">

                    <!-- This is a back button inside each category -->
                    <div class="col-12 mb-3">
                        <button onclick="showCategory('back')" class="btn btn-link text-decoration-none">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                    </div>

                    <!-- Searchbar -->
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control category-search" data-category="{{ $key }}" placeholder="Search activities...">
                    </div>

                    <!-- Difficulty Checkboxes -->
                    <div class="col-5 mb-3 me-2">
                        <div class="btn-group" role="group" aria-label="Difficulty Filters" data-category="{{ $key }}">
                            <input type="checkbox" class="btn-check difficulty-toggle" id="{{ $key }}-easy" value="easy" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="{{ $key }}-easy">Easy</label>

                            <input type="checkbox" class="btn-check difficulty-toggle" id="{{ $key }}-medium" value="medium" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="{{ $key }}-medium">Medium</label>

                            <input type="checkbox" class="btn-check difficulty-toggle" id="{{ $key }}-hard" value="hard" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="{{ $key }}-hard">Hard</label>
                        </div>
                    </div>

                    <!-- Sort Button -->
                    <div class="col-6 mb-3">
                        <select class="form-select sort-alpha" data-category="{{ $key }}">
                            <option value="az">Sort A–Z</option>
                            <option value="za">Sort Z–A</option>
                        </select>
                    </div>

                    @php
                        $filtered = $key === 'all'
                            ? $activities->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))
                            : $activities->where('category', $key)->whereNotIn('id', auth()->user()->completedActivities->pluck('id'));
                    @endphp

                    @if($filtered->isEmpty())
                        <p class="text-muted text-center">No activities found in this category.</p>
                    @endif

                    <!-- Actual Card Elements -->
                    @foreach($filtered as $activity)
                    <div class="col-md-6 mb-4 activity-card" data-name="{{ strtolower($activity->name) }}" data-difficulty="{{ strtolower($activity->difficulty) }}">
                        <x-activity-card :activity="$activity" />
                    </div>

                    @endforeach
                </div>
            @endforeach
        </div>


        <!-- Favourited Activities Tab -->
        <div class="tab-pane fade {{ $activeTab === 'favourited' ? 'show active' : '' }}" id="favourited" role="tabpanel">
            <div class="mb-3 row">
                <div class="col-12 mb-3">
                    <input type="text" class="form-control favourited-search" placeholder="Search activities...">
                </div>

                <div class="col-5 mb-3 me-2">
                    <div class="btn-group" role="group" aria-label="Difficulty Filters">
                        <input type="checkbox" class="btn-check favourited-diff" id="fav-easy" value="easy">
                        <label class="btn btn-outline-secondary" for="fav-easy">Easy</label>
                        <input type="checkbox" class="btn-check favourited-diff" id="fav-medium" value="medium">
                        <label class="btn btn-outline-secondary" for="fav-medium">Medium</label>
                        <input type="checkbox" class="btn-check favourited-diff" id="fav-hard" value="hard">
                        <label class="btn btn-outline-secondary" for="fav-hard">Hard</label>
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <select class="form-select favourited-sort">
                        <option value="">Sort</option>
                        <option value="az">A-Z</option>
                        <option value="za">Z-A</option>
                    </select>
                </div>
            </div>
            <div class="row" id="favourited-list">
                @foreach($favouritedActivities as $activity)
                    <div class="col-md-6 mb-4 activity-card"
                        data-name="{{ strtolower($activity->name) }}"
                        data-difficulty="{{ strtolower($activity->difficulty) }}">
                        <x-activity-card :activity="$activity" />
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Completed Activities Tab -->
        <div class="tab-pane fade {{ $activeTab === 'completed' ? 'show active' : '' }}" id="completed" role="tabpanel">
            <div class="mb-3 row">
                <div class="col-md-6">
                    <input type="text" class="form-control completed-search" placeholder="Search activities...">
                </div>
                <div class="col-md-3">
                    <select class="form-select completed-sort">
                        <option value="">Sort</option>
                        <option value="az">A-Z</option>
                        <option value="za">Z-A</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="btn-group" role="group" aria-label="Difficulty Filter">
                        <input type="checkbox" class="btn-check completed-diff" id="comp-easy" value="easy">
                        <label class="btn btn-outline-secondary" for="comp-easy">Easy</label>
                        <input type="checkbox" class="btn-check completed-diff" id="comp-medium" value="medium">
                        <label class="btn btn-outline-secondary" for="comp-medium">Medium</label>
                        <input type="checkbox" class="btn-check completed-diff" id="comp-hard" value="hard">
                        <label class="btn btn-outline-secondary" for="comp-hard">Hard</label>
                    </div>
                </div>
            </div>

            <div class="row" id="completed-list">
                @foreach($completedActivities as $activity)
                    <div class="col-md-6 mb-4 activity-card"
                        data-name="{{ strtolower($activity->name) }}"
                        data-difficulty="{{ strtolower($activity->difficulty) }}">
                        <x-activity-card :activity="$activity" />
                    </div>
                @endforeach
            </div>
        </div>


    </div>
</div>
<script src="{{ asset('js/activityscripts.js') }}"></script>
@endsection
