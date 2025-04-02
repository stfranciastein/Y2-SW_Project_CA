@extends('layouts.app')
@section('content')
<style>
.draggable-carousel {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    overflow-y: hidden;
    padding-bottom: 10px;
    scroll-behavior: smooth;
    -ms-overflow-style: none;  /* IE/Edge */
    scrollbar-width: none;     /* Firefox */
}

.draggable-carousel::-webkit-scrollbar {
    display: none; /* Chrome/Safari */
}

.achievement-card {
    min-width: 250px;
    flex: 0 0 auto;
    cursor: grab;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="p-3 border-0" id="greeting"></div>
                <div class="container mt-0">
                    <h3 class="mb-5 ps-1">Your Current Emissions</h3>
                    <canvas id="emissionsChart" width="400" height="500"></canvas>
                </div>
            </div>

            <!-- This contains all of the dashboard cards -->
            <div class="container mt-5">

                <!-- Your National Position -->
                <div class="card p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-flag fa-2x me-3 text-info"></i>
                            <div>
                                <p class="mb-0 fw-bold"></p>
                                <small class="text-muted">
                                    @if($percentDiff !== null)
                                        You are currently 
                                        <span class="{{ $percentDiff < 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $percentDiff !== null ? ($percentDiff < 0 ? '-' : '+') . abs($percentDiff) . '%' : 'N/A' }} {{ $percentDiff < 0 ? 'below' : 'above' }}
                                        </span>
                                        your country's average
                                    @else
                                        No comparison data available
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Global Position -->
                <div class="card p-3 my-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-globe-americas fa-2x me-3 text-secondary"></i>
                            <div>
                                <small class="text-muted">
                                    @if($globalPercentDiff !== null)
                                        You are currently 
                                        <span class="{{ $globalPercentDiff < 0 ? 'text-success' : 'text-danger' }}">
                                            {{ $globalPercentDiff < 0 ? '-' : '+' }}{{ abs($globalPercentDiff) }}% {{ $globalPercentDiff < 0 ? 'below' : 'above' }}
                                        </span>
                                        the global average
                                    @else
                                        No comparison data available
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                @if($favouritedActivities->count() > 0)
                    <h2>Your Favourited Activities</h2>
                    <div class="row">
                        @foreach($favouritedActivities as $activity)
                            <div class="col-md-6 mb-4">
                                <x-activity-card :activity="$activity" />
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('activities.index', ['tab' => 'favourited']) }}" class="btn btn-primary">See All Favourited Activities</a>
                    </div>

                @endif

            
                <h3>Recently Unlocked</h3>
                @if($unlocked->count())
                    <div id="unlockedCarousel" class="draggable-carousel mb-3">
                        @foreach($unlocked as $achievement)
                            <div class="card border-success achievement-card">
                                @if($achievement->image_url)
                                    <img src="{{ asset('storage/' . $achievement->image_url) }}" class="card-img-top" alt="Achievement Image">
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title">{{ $achievement->description }}</h6>
                                    <p class="card-text"><strong>Requirement:</strong> {{ $achievement->points_required }} activities</p>
                                    <span class="badge bg-success">Unlocked</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif


            </div>


        </div>
    </div>
</div>
<!-- This is the bar chart -->
<script>
    const ctx = document.getElementById('emissionsChart').getContext('2d');
    const emissionsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Your Emissions', 'National Average', 'Global Average'],
            datasets: [
                // 2030 Target Line (targeting 2 tons per person for global emissions in 2030)
                {
                    label: '2030 Target',
                    data: [2000, 2000, 2000], // 2 tons (2000 kg) per person target for each category
                    type: 'line',
                    fill: false,
                    borderColor: 'rgba(0, 0, 0, 1)', 
                    borderWidth: 2,
                    borderDash: [10, 3], // Dotted line style (5px dash, 5px gap)
                    pointRadius: 0, // Removes points on the line
                    tension: 0, 
                    spanGaps: true, 
                    order: 0, 
                    xAxisID: 'x', 
                },
                {
                    label: 'Food',
                    data: [
                        {{ $emissions->food }},
                        {{ $countryEmissions['food'] ?? 0 }},
                        {{ $overallEmissions['food'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(13, 228, 145, 0.7)', // Food color
                    borderColor: 'rgb(15, 199, 128)',
                    borderWidth: 1,
                    order: 1 
                },
                {
                    label: 'Waste',
                    data: [
                        {{ $emissions->waste }},
                        {{ $countryEmissions['waste'] ?? 0 }},
                        {{ $overallEmissions['waste'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(255, 159, 64, 0.7)', // Waste color
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1,
                    order: 1 
                },
                {
                    label: 'Energy',
                    data: [
                        {{ $emissions->energy }},
                        {{ $countryEmissions['energy'] ?? 0 }},
                        {{ $overallEmissions['energy'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)', // Energy color
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    order: 1 
                },
                {
                    label: 'Land',
                    data: [
                        {{ $emissions->land }},
                        {{ $countryEmissions['land'] ?? 0 }},
                        {{ $overallEmissions['land'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.7)', // Land color
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    order: 1 
                },
                {
                    label: 'Air',
                    data: [
                        {{ $emissions->air }},
                        {{ $countryEmissions['air'] ?? 0 }},
                        {{ $overallEmissions['air'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(153, 102, 255, 0.7)', // Air color
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    order: 1 
                },
                {
                    label: 'Sea',
                    data: [
                        {{ $emissions->sea }},
                        {{ $countryEmissions['sea'] ?? 0 }},
                        {{ $overallEmissions['sea'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.7)', // Sea color
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    order: 1 
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    stacked: true, // Enable stacking on the x-axis
                    grid: {
                        display: false,
                    },
                    ticks: {
                        autoSkip: false,
                    },
                },
                y: {
                    beginAtZero: true,
                    stacked: true, // Enable stacking on the y-axis
                    ticks: {
                        display: false,
                    },
                    grid: {
                        display: false,
                    },
                }
            },
            plugins: {
                legend: {
                    position: 'bottom', // Position of the legend
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw + 'kg CO2/year';
                        }
                    }
                }
            }
        }
    });
</script>
<!--------------------------->
<div id="user-name" data-user="{{ auth()->user()->name }}" style="display: none;"></div> <!-- This is required for the greeting message -->
<script src="{{ asset('js/greeter.js') }}"></script>
<script src="{{ asset('js/drag.js') }}"></script> <!-- This is so the achievement cards are draggable -->
@endsection
