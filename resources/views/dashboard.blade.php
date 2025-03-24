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

            </div>
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('emissionsChart').getContext('2d');
    const emissionsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Food', 'Waste', 'Energy', 'Land', 'Air', 'Sea'],
            datasets: [{
                label: 'Baseline Emissions',
                data: [
                    {{ $emissions->baseline_food }},
                    {{ $emissions->baseline_waste }},
                    {{ $emissions->baseline_energy }},
                    {{ $emissions->baseline_land }},
                    {{ $emissions->baseline_air }},
                    {{ $emissions->baseline_sea }}
                ],
                backgroundColor: 'rgba(33, 37, 41, 0.7)',
                borderColor: 'rgba(33, 37, 41, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>

@endsection
