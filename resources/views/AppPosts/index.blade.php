@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($appposts as $apppost)
        <x-app-post-preview :apppost="$apppost" />
    @endforeach
</div>
@endsection
