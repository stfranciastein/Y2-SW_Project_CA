@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __("You're logged in!") }}
                </div>

                <div class="container mt-4">
                    <h3>Your Emission Breakdown</h3>
                    <canvas id="emissionsChart" width="400" height="400"></canvas>
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
                        <a href="{{ route('favouritedactivities.index') }}" class="btn btn-primary">See All Favourited Activities</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('emissionsChart').getContext('2d');
    const emissionsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Your Emissions', 'National Average', 'Global Average'],
            datasets: [
                {
                    label: 'Food',
                    data: [
                        {{ $emissions->baseline_food }},
                        {{ $countryEmissions['food'] ?? 0 }},
                        {{ $overallEmissions['food'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(13, 228, 145, 0.7)', // Food color
                    borderColor: 'rgb(15, 199, 128)',
                    borderWidth: 1
                },
                {
                    label: 'Waste',
                    data: [
                        {{ $emissions->baseline_waste }},
                        {{ $countryEmissions['waste'] ?? 0 }},
                        {{ $overallEmissions['waste'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(255, 159, 64, 0.7)', // Waste color
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Energy',
                    data: [
                        {{ $emissions->baseline_energy }},
                        {{ $countryEmissions['energy'] ?? 0 }},
                        {{ $overallEmissions['energy'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)', // Energy color
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Land',
                    data: [
                        {{ $emissions->baseline_land }},
                        {{ $countryEmissions['land'] ?? 0 }},
                        {{ $overallEmissions['land'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.7)', // Land color
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Air',
                    data: [
                        {{ $emissions->baseline_air }},
                        {{ $countryEmissions['air'] ?? 0 }},
                        {{ $overallEmissions['air'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(153, 102, 255, 0.7)', // Air color
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Sea',
                    data: [
                        {{ $emissions->baseline_sea }},
                        {{ $countryEmissions['sea'] ?? 0 }},
                        {{ $overallEmissions['sea'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.7)', // Sea color
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
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
                    }
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


@endsection
