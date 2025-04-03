@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Display Profile Info -->
            <div id="profile-display">
                <div class="pt-3 row d-flex align-items-center mb-lg-4">
                    <div class="col-6">
                        <img src="{{ $user->image_url ? asset('storage/' . $user->image_url) : asset('images/default-profile.png') }}"
                            alt="Profile Picture"
                            class="rounded-circle img-fluid object-fit-cover border-gray-300 mx-auto d-block">
                    </div>
                    <div class="col-6 row">
                        <div class="col-lg-12 col-12 d-lg-flex gap-5">
                            <p class="mb-2"><strong>{{ auth()->user()->name }}</strong></p>
                            <p class="mb-2 fst-italic">{{ auth()->user()->country }}</p>
                            <p class="mb-2"><strong>Level:</strong> {{ auth()->user()->level }}</p>
                        </div>
                        <!-- This will onl display on large screens, while the one outside will only display on smaller ones. --> 
                        <p class="mt-3 mb-3 col-12 d-none d-lg-block">
                            {{ auth()->user()->biography }}
                        </p>
                        <div class="row d-none d-lg-flex">
                            <div class="col-6">
                                <button class="btn btn-dark mb-2 w-100" onclick="toggleEdit(true)">Edit Profile</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-dark mb-2 w-100" onclick="window.location='{{ route('onboarding') }}'">Update Emissions</button>
                            </div>
                            <p class="mt-2"><strong>Activities Completed:</strong> 
                                {{ auth()->user()->completedActivities->count() }} / {{ (auth()->user()->level * 5) }}
                            </p>
                            <div class="progress mb-3" style="height: 20px; padding: 0; margin: 0; border-radius: 0;">
                                <div class="progress-bar" role="progressbar"
                                    style="
                                        width: {{ (auth()->user()->completedActivities->count() - (($user->level - 1) * 5)) / 5 * 100 }}%;
                                        background-image: linear-gradient(90deg, rgb(19, 228, 165), rgb(15, 141, 199));
                                        border-radius: 0;
                                        margin: 0;"
                                    aria-valuenow="{{ auth()->user()->completedActivities->count() }}"
                                    aria-valuemin="0"
                                    aria-valuemax="5">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-3 col-12 d-block d-lg-none">
                        {{ auth()->user()->biography }}
                    </p>
                </div>


                <!-- Profile Buttons -->
                <div class="row d-lg-none">
                    <div class="col-6">
                        <button class="btn btn-dark mb-2 w-100" onclick="toggleEdit(true)">Edit Profile</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-dark mb-2 w-100" onclick="window.location='{{ route('onboarding') }}'">Update Emissions</button>
                    </div>
                </div>

                <div class="d-lg-none">
                <!-- Progress Bar for Completed Activities -->
                <p class="mt-2"><strong>Activities Completed:</strong> 
                    {{ auth()->user()->completedActivities->count() }} / {{ (auth()->user()->level * 5) }}
                </p>
                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar"
                            style="
                                width: {{ (auth()->user()->completedActivities->count() - (($user->level - 1) * 5)) / 5 * 100 }}%;
                                background-image: linear-gradient(90deg,rgb(19, 228, 165),rgb(15, 141, 199));
                            "
                            aria-valuenow="{{ auth()->user()->completedActivities->count() }}"
                            aria-valuemin="0"
                            aria-valuemax="5">
                        </div>
                    </div>
                </div>

                <div class="card p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-leaf fa-2x me-3 text-success"></i>
                            <div>
                                <p class="mb-0 fw-bold">Impact Points</p>
                                <small class="text-muted">Total earned from activities</small>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-0">
                            {{ auth()->user()->completedActivities->sum('impact_points') }}
                        </h4>
                    </div>
                </div>

                <div class="card p-3 mt-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-trophy fa-2x me-3 text-warning"></i>
                            <div>
                                <p class="mb-0 fw-bold">Achievements</p>
                                <small class="text-muted">Total number earned</small>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-0">
                            {{ auth()->user()->achievements->count() }}
                        </h4>
                    </div>
                </div>

                <div class="card p-3 mt-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-chart-line fa-2x me-3 text-danger"></i>
                            <div>
                                <p class="mb-0 fw-bold">Current Emissions</p>
                                <small class="text-muted">
                                    Original: {{
                                        optional(auth()->user()->userEmissions()->oldest()->first())->baseline_food +
                                        optional(auth()->user()->userEmissions()->oldest()->first())->baseline_waste +
                                        optional(auth()->user()->userEmissions()->oldest()->first())->baseline_energy +
                                        optional(auth()->user()->userEmissions()->oldest()->first())->baseline_land +
                                        optional(auth()->user()->userEmissions()->oldest()->first())->baseline_air +
                                        optional(auth()->user()->userEmissions()->oldest()->first())->baseline_sea
                                    }} kg CO₂/year
                                </small>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-0">
                            {{
                                (
                                    optional(auth()->user()->userEmissions()->latest()->first())->baseline_food -
                                    auth()->user()->activityReductions->sum('reduction_food')
                                ) +
                                (
                                    optional(auth()->user()->userEmissions()->latest()->first())->baseline_waste -
                                    auth()->user()->activityReductions->sum('reduction_waste')
                                ) +
                                (
                                    optional(auth()->user()->userEmissions()->latest()->first())->baseline_energy -
                                    auth()->user()->activityReductions->sum('reduction_energy')
                                ) +
                                (
                                    optional(auth()->user()->userEmissions()->latest()->first())->baseline_land -
                                    auth()->user()->activityReductions->sum('reduction_land')
                                ) +
                                (
                                    optional(auth()->user()->userEmissions()->latest()->first())->baseline_air -
                                    auth()->user()->activityReductions->sum('reduction_air')
                                ) +
                                (
                                    optional(auth()->user()->userEmissions()->latest()->first())->baseline_sea -
                                    auth()->user()->activityReductions->sum('reduction_sea')
                                )
                            }} kg
                        </h4>
                    </div>                    
                </div>

                <div class="row">
                    <div class="p-3 col-12 d-flex justify-content-center">
                    <canvas id="emissionsPieChart"></canvas>
                    </div>
                    <div class="text-center m-3">
                        <p class="text-muted small m-0">Built on Laravel {{ Illuminate\Foundation\Application::VERSION }}</p>
                        <p class="text-muted small">Created by Joshua Santiago-Francia</p>
                    </div>
                </div>


            </div> <!-- This is the div that closes the profile section -->

            <!-- EVERYTHING AFTER THIS SHOULD JUST BE THE EDIT FORMS -->
            <!-- Editable Profile Form -->
            <div id="profile-form" style="display: none;">

                <!-- Back Button --> 
                <button class="btn btn-light text-dark mb-1" onclick="toggleEdit(false)" style="background-color: #f8f9fa; border: none; box-shadow: none;">
                    <i class="fas fa-arrow-left"></i>  <strong>Edit Profile</strong>
                </button>

                <!-- Edit Profile Info -->
                <div class="mb-4">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Change Password Section -->
                <div class="mt-5">
                    <div class="mb-4">
                        @include('profile.partials.update-password-form')
                        @include('profile.partials.delete-user-form')
                        @include('profile.partials.logout-form')
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
<script>
    const pieCtx = document.getElementById('emissionsPieChart').getContext('2d');

    const emissionsPieChart = new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Food', 'Waste', 'Energy', 'Land', 'Air', 'Sea'],
            datasets: [{
                data: [
                    {{ optional(auth()->user()->userEmissions()->latest()->first())->baseline_food - auth()->user()->activityReductions->sum('reduction_food') }},
                    {{ optional(auth()->user()->userEmissions()->latest()->first())->baseline_waste - auth()->user()->activityReductions->sum('reduction_waste') }},
                    {{ optional(auth()->user()->userEmissions()->latest()->first())->baseline_energy - auth()->user()->activityReductions->sum('reduction_energy') }},
                    {{ optional(auth()->user()->userEmissions()->latest()->first())->baseline_land - auth()->user()->activityReductions->sum('reduction_land') }},
                    {{ optional(auth()->user()->userEmissions()->latest()->first())->baseline_air - auth()->user()->activityReductions->sum('reduction_air') }},
                    {{ optional(auth()->user()->userEmissions()->latest()->first())->baseline_sea - auth()->user()->activityReductions->sum('reduction_sea') }},
                ],
                backgroundColor: [
                    '#0dd491', // Food
                    '#ff9f40', // Waste
                    '#36a2eb', // Energy
                    '#4bc0c0', // Land
                    '#9966ff', // Air
                    '#ff6384'  // Sea
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

@endsection
