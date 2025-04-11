@extends('layouts.app')
@section('content')
<!-- Tab Navigation -->
<!-- Moved outside so I could stretch it across the container -->
<ul class="nav nav-tabs border-0 row row-cols-3 g-0 text-center" id="activityTabs" role="tablist">
    @foreach ($tabs as $key => $label)
        <li class="nav-item col" role="presentation">
            <a class="nav-link h4 py-3 w-100 border-0 border-bottom border-5 text-uppercase
                {{ $key === 'general' ? 'active' : '' }}"
               id="{{ $key }}-tab"
               data-bs-toggle="tab"
               href="#{{ $key }}"
               role="tab"
               aria-controls="{{ $key }}"
               aria-selected="{{ $key === 'general' ? 'true' : 'false' }}">
                {{ $label }}
            </a>
        </li>
    @endforeach
</ul>

<div class="container-sm rounded-4 shadow-sm">
    <!-- Tab Content -->
    <div class="tab-content mt-4" id="activityTabsContent">
    <!-- General Activities Tab -->
        <div class="tab-pane fade {{ $activeTab === 'general' ? 'show active' : '' }}" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div id="category-selector" class="row g-3">
                @foreach($categories as $key => $label)
                    @php
                        $count = $key === 'all'
                            ? $activities->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))->count()
                            : $activities->where('category', $key)->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))->count();
                    @endphp
                    <!-- The All Categories Card -->
                    @if($key === 'all')
                        <div class="col-12 d-flex justify-content-center">
                            <div class="position-relative rounded shadow-sm clickable w-100"
                                style="max-width: 600px; aspect-ratio: 1 / 1; background-image: url('{{ asset('images/location.png') }}'); background-size: cover; background-position: center; overflow: hidden;"
                                onclick="showCategory('{{ $key }}')">
                                <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.6); z-index: 1;"></div>
                                <div class="position-relative z-2 d-flex flex-column justify-content-center align-items-center h-100 text-white text-center px-2">
                                    <h3 class="fw-bold">All Activities</h3>
                                    <p class="fst-italic mb-1">"You're never too small to make a difference."</p>
                                    <p class="mb-0">{{ $count }} activities</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Every individual category gets its background image through concatenation. -->
                        <div class="col-lg-2 col-md-2 col-6">
                            <div class="position-relative rounded shadow-sm clickable w-100"
                                onclick="showCategory('{{ $key }}')"
                                style="aspect-ratio: 1 / 1; background-image: url('{{ asset('images/assets/activitybackgrounds/' . $key . '.jpg') }}'); background-size: cover; background-position: center; overflow: hidden;">
                                <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.55); z-index: 1;"></div>
                                <div class="position-relative z-2 d-flex flex-column justify-content-center align-items-center h-100 text-white text-center px-2">
                                    <i class="fas {{ match($key) {
                                        'energy' => 'fa-bolt',
                                        'food' => 'fa-utensils',
                                        'waste' => 'fa-trash',
                                        'land' => 'fa-tree',
                                        'air' => 'fa-wind',
                                        'sea' => 'fa-water',
                                        default => 'fa-leaf',
                                    } }} fa-2x mb-2"></i>
                                    <h6 class="fw-bold mb-1">{{ $label }}</h6>
                                    <small>{{ $count }} activities</small>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="col-12 d-flex justify-content-center mb-4">
                    <a href="{{ route('activities.create') }}" class="position-relative rounded shadow-sm w-100 text-decoration-none p-3 bg-black">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <h3 class="fw-bold text-light">Add New Activity</h3>
                            <p class="text-light">Click here to create a new activity</p>
                        </div>
                    </a>
                </div>

            </div>

            @foreach($categories as $key => $label)
            <div class="row category-list" id="category-{{ $key }}" style="display: none;">
                <!-- Back button -->
                <div class="col-12 mb-3">
                    <button onclick="showCategory('back')" class="btn btn-link text-decoration-none">
                        <i class="fas fa-arrow-left text-black"></i>
                    </button>
                </div>

                <!-- Searchbar -->
                <div class="col-12 mb-4">
                    <input type="text"
                        class="form-control category-search border-dark border-2 rounded-4 px-4 py-2"
                        data-category="{{ $key }}"
                        placeholder="Search activities...">
                </div>

                <!-- Filters + Sort row -->
                <div class="col-12 mb-4">
                    <div class="d-flex gap-2 justify-content-between align-items-center">
                        <!-- Difficulty Toggle -->
                        <div class="btn-group gap-1" role="group" aria-label="Difficulty Filters" data-category="{{ $key }}">
                            <input type="checkbox" class="btn-check difficulty-toggle" id="{{ $key }}-easy" value="easy" autocomplete="off">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="{{ $key }}-easy">Easy</label>

                            <input type="checkbox" class="btn-check difficulty-toggle" id="{{ $key }}-medium" value="medium" autocomplete="off">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="{{ $key }}-medium">Medium</label>

                            <input type="checkbox" class="btn-check difficulty-toggle" id="{{ $key }}-hard" value="hard" autocomplete="off">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="{{ $key }}-hard">Hard</label>
                        </div>

                        <!-- Sort Dropdown -->
                        <select class="form-select sort-alpha border-dark rounded-3 px-4 py-2"
                                style="max-width: 200px;"
                                data-category="{{ $key }}">
                            <option value="az">Sort A–Z</option>
                            <option value="za">Sort Z–A</option>
                        </select>
                    </div>
                </div>

                <!-- Filtered Activities -->
                @php
                    $filtered = $key === 'all'
                        ? $activities->whereNotIn('id', auth()->user()->completedActivities->pluck('id'))
                        : $activities->where('category', $key)->whereNotIn('id', auth()->user()->completedActivities->pluck('id'));
                @endphp

                @if($filtered->isEmpty())
                    <p class="text-muted text-center">No activities found in this category.</p>
                @endif

                @foreach($filtered as $activity)
                    <div class="col-md-6 mb-4 activity-card"
                        data-name="{{ strtolower($activity->name) }}"
                        data-difficulty="{{ strtolower($activity->difficulty) }}">
                        <x-activity-card :activity="$activity" />
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>

        <!-- Favourited Activities Tab -->
        <div class="tab-pane fade {{ $activeTab === 'favourited' ? 'show active' : '' }}" id="favourited" role="tabpanel">
            <div class="mb-4 row">
                <div class="col-12 mb-4">
                    <input type="text"
                        class="form-control favourited-search border-dark border-2 rounded-4 px-4 py-2"
                        placeholder="Search activities...">
                </div>

                <div class="col-12 mb-4">
                    <div class="d-flex gap-2 justify-content-between align-items-center">
                        <!-- Difficulty Toggle -->
                        <div class="btn-group gap-1" role="group" aria-label="Difficulty Filters">
                            <input type="checkbox" class="btn-check favourited-diff" id="fav-easy" value="easy">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="fav-easy">Easy</label>

                            <input type="checkbox" class="btn-check favourited-diff" id="fav-medium" value="medium">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="fav-medium">Medium</label>

                            <input type="checkbox" class="btn-check favourited-diff" id="fav-hard" value="hard">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="fav-hard">Hard</label>
                        </div>

                        <!-- Sort Dropdown -->
                        <select class="form-select favourited-sort border-dark rounded-3 px-4 py-2" style="max-width: 200px;">
                            <option value="">Sort</option>
                            <option value="az">A-Z</option>
                            <option value="za">Z-A</option>
                        </select>
                    </div>
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
            <div class="mb-4 row">
                <div class="col-12 mb-4">
                    <input type="text"
                        class="form-control completed-search border-dark border-2 rounded-4 px-4 py-2"
                        placeholder="Search activities...">
                </div>

                <div class="col-12 mb-4">
                    <div class="d-flex gap-2 justify-content-between align-items-center">
                        <!-- Difficulty Toggle -->
                        <div class="btn-group gap-1" role="group" aria-label="Difficulty Filters">
                            <input type="checkbox" class="btn-check completed-diff" id="comp-easy" value="easy">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="comp-easy">Easy</label>

                            <input type="checkbox" class="btn-check completed-diff" id="comp-medium" value="medium">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="comp-medium">Medium</label>

                            <input type="checkbox" class="btn-check completed-diff" id="comp-hard" value="hard">
                            <label class="btn btn-outline-dark rounded-3 px-3 py-1" for="comp-hard">Hard</label>
                        </div>

                        <!-- Sort Dropdown -->
                        <select class="form-select completed-sort border-dark rounded-3 px-4 py-2" style="max-width: 200px;">
                            <option value="">Sort</option>
                            <option value="az">A-Z</option>
                            <option value="za">Z-A</option>
                        </select>
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
