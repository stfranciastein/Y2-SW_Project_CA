@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Favourited Activities</h2>
    <div class="row">
        @foreach($favouritedActivities as $activity)
            <div class="col-md-6 mb-4">
                <x-activity-card :activity="$activity" />
            </div>
        @endforeach
    </div>
</div>
@endsection

