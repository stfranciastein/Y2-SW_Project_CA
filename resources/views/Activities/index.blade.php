@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">All Activities</h2>
    <div class="row">
        @foreach($activities as $activity)
        <div class="col-md-6 mb-4">
            <x-activity-card :activity="$activity" />
        </div>
        @endforeach
    </div>
</div>
@endsection
