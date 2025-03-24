const ctx = document.getElementById('emissionsChart').getContext('2d');
const emissionsChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Your Emissions', 'National Average', 'Global Average'],
        datasets: [
            {
                label: 'Food',
                data: [
                    emissionData.food,
                    emissionData.countryEmissions.food ?? 0,
                    emissionData.overallEmissions.food ?? 0
                ],
                backgroundColor: 'rgba(13, 228, 145, 0.7)', // Food color
                borderColor: 'rgb(15, 199, 128)',
                borderWidth: 1
            },
            {
                label: 'Waste',
                data: [
                    emissionData.waste,
                    emissionData.countryEmissions.waste ?? 0,
                    emissionData.overallEmissions.waste ?? 0
                ],
                backgroundColor: 'rgba(255, 159, 64, 0.7)', // Waste color
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            },
            {
                label: 'Energy',
                data: [
                    emissionData.energy,
                    emissionData.countryEmissions.energy ?? 0,
                    emissionData.overallEmissions.energy ?? 0
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.7)', // Energy color
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Land',
                data: [
                    emissionData.land,
                    emissionData.countryEmissions.land ?? 0,
                    emissionData.overallEmissions.land ?? 0
                ],
                backgroundColor: 'rgba(75, 192, 192, 0.7)', // Land color
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Air',
                data: [
                    emissionData.air,
                    emissionData.countryEmissions.air ?? 0,
                    emissionData.overallEmissions.air ?? 0
                ],
                backgroundColor: 'rgba(153, 102, 255, 0.7)', // Air color
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Sea',
                data: [
                    emissionData.sea,
                    emissionData.countryEmissions.sea ?? 0,
                    emissionData.overallEmissions.sea ?? 0
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
                max: 600, // Adjust this as needed
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
                        return tooltipItem.dataset.label + ': ' + tooltipItem.raw + '%';
                    }
                }
            }
        }
    }
});
