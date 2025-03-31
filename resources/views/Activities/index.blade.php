@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Activities</h2>

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
            <div class="row">
                @foreach($activities->whereNotIn('id', auth()->user()->completedActivities->pluck('id')) as $activity)
                    <div class="col-md-6 mb-4">
                        <x-activity-card :activity="$activity" />
                    </div>
                @endforeach
            </div>
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
@endsection
