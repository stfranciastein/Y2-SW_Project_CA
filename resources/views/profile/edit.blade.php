@extends('layouts.app')
@section('content')
<style>
    html, body {
        overflow-x: hidden;
        max-width: 100%;
    }

    body {
        background-image: url('{{ asset('images/assets/whiteground.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .dashboard-wrapper {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Display Profile Info -->
            <div id="profile-display">
                <div class="pt-3 row mx-0 justify-content-center mb-lg-4 bg-white p-3 shadow-sm overflow-hidden rounded-4">
                    <div class="col-12 text-center">
                        <!-- Profile Pic with edit floater -->
                        <div class="position-relative d-inline-block mx-auto" style="max-width: 100%;">
                            <img src="{{ $user->image_url ? asset($user->image_url) : asset('images/default-profile.png') }}"
                                alt="Profile Picture"
                                class="rounded-circle border border-2 border-gray-300 img-fluid"
                                style="max-width: 250px; height: auto; object-fit: cover;">

                            <button onclick="toggleEdit(true)"
                                class="btn btn-light btn-sm rounded-circle position-absolute bottom-0 end-0 translate-middle border-1 border-black"
                                style="z-index: 2; width: 32px; height: 32px;">
                                <i class="fas fa-pen fa-sm text-dark"></i>
                            </button>
                        </div>
                        <!-- Text -->
                        <p class="mt-3 mb-1 text-center text-muted small">{{ $levelTitle }}</p>
                        <p class="mt-0 h3 text-uppercase">{{ auth()->user()->name }}</p>
                        <div class="d-flex flex-wrap gap-2 justify-content-center mt-0 text-center">
                            <p class="text-uppercase fw-semibold mb-0">{{ auth()->user()->country }}</p>
                            <p class="text-uppercase fw-semibold mb-0">|</p>
                            <p class="text-uppercase fw-semibold mb-0">Level {{ auth()->user()->level }}</p>
                        </div>

                        <p class="text-dark mt-2 px-2">{{ auth()->user()->biography }}</p>
                    </div>
                </div>

                <div class="card mt-3 border-0 shadow-sm rounded-4 p-3">
                    <div class="px-2">
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

                    <!-- Impact Points -->
                    <div class="card rounded-0 border-0 border-bottom py-4 px-2 mb-1">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-success d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-leaf fs-3 text-white"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-bold text-uppercase">Impact Points</p>
                                    <small class="text-muted">Total earned from activities</small>
                                </div>
                            </div>
                            <p class="h4 fw-medium mb-0">
                                {{ auth()->user()->completedActivities->sum('impact_points') }}
                            </p>
                        </div>
                    </div>

                    <!-- Achievements -->
                    <a href="{{ route('achievements.index') }}" class="text-decoration-none text-dark">
                        <div class="card rounded-0 border-0 border-bottom py-4 px-2 mb-1 position-relative">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-trophy fs-2 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold text-uppercase">Achievements</p>
                                        <small class="text-muted">Total number earned</small>
                                    </div>
                                </div>
                                <p class="h4 fw-medium mb-0">
                                    {{ auth()->user()->achievements->count() }}
                                </p>
                            </div>
                            <span class="stretched-link"></span>
                        </div>
                    </a>

                    <!-- Current Emissions -->
                    <div class="card rounded-0 border-0 border-bottom py-4 px-2 mb-1" data-bs-toggle="modal" data-bs-target="#emissionsModal" style="cursor: pointer;">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-danger d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-chart-line fs-2 text-white"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-bold text-uppercase">Current Emissions</p>
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
                            <p class="h4 fw-medium mb-0">
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
                            </p>
                        </div>                    
                    </div>
                    <!-- Emissions Over Time Modal -->
                    <div class="modal fade" id="emissionsModal" tabindex="-1" aria-labelledby="emissionsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4 overflow-hidden">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="emissionsModalLabel">Your Emissions Over Time</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <canvas id="emissionsLineChart" style="height: 300px;"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>



                    <div class="p-3 col-12 d-flex justify-content-center">
                        <canvas id="emissionsPieChart"></canvas>
                    </div>

                    <div class="d-flex justify-content-center mt-1 mb-3">
                        <button class="btn btn-dark rounded-4 px-4" onclick="window.location='{{ route('onboarding') }}'">
                            Update Estimations
                        </button>
                    </div>

                </div>
                <div class="row">
                    <div class="text-center m-3">
                        <p class="text-muted small m-0">Built on Laravel {{ Illuminate\Foundation\Application::VERSION }}</p>
                        <p class="text-muted small">Created by Joshua Santiago-Francia</p>
                    </div>
                </div>
            </div>


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
<!-- Pie Chart -->
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
<!-- Line Chart -->
<script>
    const lineCtx = document.getElementById('emissionsLineChart').getContext('2d');

    const emissionsData = @json(auth()->user()->userEmissions->map(function($record) {
        return [
            $record->created_at->format('M j'),
            $record->baseline_food +
            $record->baseline_waste +
            $record->baseline_energy +
            $record->baseline_land +
            $record->baseline_air +
            $record->baseline_sea
        ];
    }));

    const labels = emissionsData.map(e => e[0]);
    const values = emissionsData.map(e => e[1]);

    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Emissions (kg CO₂/year)',
                data: values,
                borderColor: '#ff6384',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'kg CO₂/year'
                    }
                }
            }
        }
    });
</script>




@endsection
