@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Display Profile Info -->
            <div id="profile-display">
            <img src="{{ $user->image_url ? asset('storage/' . $user->image_url) : asset('images/default-profile.png') }}"
                alt="Profile Picture"
                class="rounded-circle"
                style="width: 150px; height: 150px; object-fit: cover;">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Country:</strong> {{ auth()->user()->country }}</p>
                <p><strong>Biography:</strong> {{ auth()->user()->biography }}</p>
                <p><strong>Level:</strong> {{ auth()->user()->level }}</p>

                <!-- Progress Bar for Completed Activities -->
                <p><strong>Activities Completed:</strong> 
                    {{ auth()->user()->completedActivities->count() }} / {{ (auth()->user()->level * 5) }}
                </p>

                <div class="progress mb-3">
                    <div class="progress-bar" role="progressbar" style="width: 
                        {{ (auth()->user()->completedActivities->count() - (($user->level - 1) * 5)) / 5 * 100 }}%" 
                        aria-valuenow="{{ auth()->user()->completedActivities->count() }}" 
                        aria-valuemin="0" 
                        aria-valuemax="5">
                    </div>
                </div>

                <!-- Profile Buttons -->
                <button class="btn btn-dark mt-3" onclick="toggleEdit(true)">Edit Profile</button>
                <a href="{{ route('onboarding') }}" class="btn btn-dark mt-3">Update Emissions</a>

            </div>

            <!-- Editable Profile Form -->
            <div id="profile-form" style="display: none;">
                <!-- Edit Profile Info -->
                <div class="mb-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <button class="btn btn-outline-secondary" onclick="toggleEdit(false)">Cancel</button>

                <!-- Change Password Section -->
                <div class="mt-5">
                    <h4 class="mb-3">Change Password</h4>
                    <div class="mb-4">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account Section -->
                <div class="mt-5">
                    <h4 class="mb-3 text-danger">Delete Account</h4>
                    <div>
                        @include('profile.partials.delete-user-form')
                    </div>
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
