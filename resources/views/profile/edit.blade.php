@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-5">{{ __('Profile') }}</h2>

            <!-- Display Profile Info -->
            <div id="profile-display">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Country:</strong> {{ auth()->user()->country }}</p>
                <p><strong>Biography:</strong> {{ auth()->user()->biography }}</p>
                <p><strong>Level:</strong> {{ auth()->user()->level }}</p>
                <button class="btn btn-dark mt-3" onclick="toggleEdit(true)">Edit Profile</button>
            </div>

            <!-- Editable Profile Form -->
            <div id="profile-form" style="display: none;">
                <div class="mb-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <button class="btn btn-outline-secondary" onclick="toggleEdit(false)">Cancel</button>
            </div>

            <div class="mt-5">
                <h4 class="mb-3">Change Password</h4>
                <div class="mb-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="mt-5">
                <h4 class="mb-3 text-danger">Delete Account</h4>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleEdit(showForm) {
        document.getElementById('profile-display').style.display = showForm ? 'none' : 'block';
        document.getElementById('profile-form').style.display = showForm ? 'block' : 'none';
    }
</script>
@endsection
