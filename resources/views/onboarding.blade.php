@extends('layouts.app')

@section('content')
<div class="onboard-wrapper">
    <div class="onboard-card">
        <div class="onboard-header justify-content-center text-center">
            <img src="{{ asset('images/assets/logo_blue.png') }}" class="logo" alt="Logo">
            <h2>{{ auth()->user()->onboarded ? 'Update Emissions' : 'Complete Your Onboarding' }}</h2>
        </div>

        <div class="progress-container mb-4">
            <div class="progress-bar" id="progressBar"></div>
        </div>

        <form method="POST" action="{{ url('/onboarding') }}" id="onboardingForm">
            @csrf

            {{-- Step 1 --}}
            <div class="onboard-step active-step">
                <div class="mb-4">
                    <label class="form-label mb-3">How often do you consume animal products?</label>
                    <div class="option-group">
                        <input type="radio" id="food1" name="baseline_food" value="1200" required>
                        <label for="food1">Daily</label>

                        <input type="radio" id="food2" name="baseline_food" value="800">
                        <label for="food2">A few times a week</label>

                        <input type="radio" id="food3" name="baseline_food" value="400">
                        <label for="food3">Occasionally</label>

                        <input type="radio" id="food4" name="baseline_food" value="100">
                        <label for="food4">Almost never</label>
                    </div>
                </div>
                <button type="button" class="btn btn-primary w-100" onclick="nextStep()">Next</button>
            </div>

            {{-- Step 2 --}}
            <div class="onboard-step">
                <div class="mb-4">
                    <label class="form-label mb-3">How consistently do you recycle waste?</label>
                    <div class="option-group">
                        <input type="radio" id="waste1" name="baseline_waste" value="400" required>
                        <label for="waste1">Not at all</label>

                        <input type="radio" id="waste2" name="baseline_waste" value="300">
                        <label for="waste2">Rarely</label>

                        <input type="radio" id="waste3" name="baseline_waste" value="200">
                        <label for="waste3">Sometimes</label>

                        <input type="radio" id="waste4" name="baseline_waste" value="100">
                        <label for="waste4">Often</label>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn border-0 w-50" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-primary w-50" onclick="nextStep()">Next</button>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="onboard-step">
                <div class="mb-4">
                    <label class="form-label mb-3">How much energy do you typically use at home?</label>
                    <div class="option-group">
                        <input type="radio" id="energy1" name="baseline_energy" value="1000" required>
                        <label for="energy1">Very high</label>

                        <input type="radio" id="energy2" name="baseline_energy" value="750">
                        <label for="energy2">High</label>

                        <input type="radio" id="energy3" name="baseline_energy" value="500">
                        <label for="energy3">Moderate</label>

                        <input type="radio" id="energy4" name="baseline_energy" value="250">
                        <label for="energy4">Low</label>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn border-0 w-50" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-primary w-50" onclick="nextStep()">Next</button>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="onboard-step">
                <div class="mb-4">
                    <label class="form-label mb-3">How often do you rely on public transport?</label>
                    <div class="option-group">
                        <input type="radio" id="land1" name="baseline_land" value="600" required>
                        <label for="land1">Never</label>

                        <input type="radio" id="land2" name="baseline_land" value="450">
                        <label for="land2">Rarely</label>

                        <input type="radio" id="land3" name="baseline_land" value="300">
                        <label for="land3">Sometimes</label>

                        <input type="radio" id="land4" name="baseline_land" value="150">
                        <label for="land4">Frequently</label>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn border-0 w-50" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-primary w-50" onclick="nextStep()">Next</button>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="onboard-step">
                <div class="mb-4">
                    <label class="form-label mb-3">How many flights do you take each year?</label>
                    <div class="option-group">
                        <input type="radio" id="air1" name="baseline_air" value="1200" required>
                        <label for="air1">More than 10</label>

                        <input type="radio" id="air2" name="baseline_air" value="900">
                        <label for="air2">5–10</label>

                        <input type="radio" id="air3" name="baseline_air" value="500">
                        <label for="air3">2–5</label>

                        <input type="radio" id="air4" name="baseline_air" value="100">
                        <label for="air4">1</label>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn border-0 w-50" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-primary w-50" onclick="nextStep()">Next</button>
                </div>
            </div>

            {{-- Step 6 --}}
            <div class="onboard-step">
                <div class="mb-4">
                    <label class="form-label mb-3">How often do you travel by sea (e.g., cruise or ferry)?</label>
                    <div class="option-group">
                        <input type="radio" id="sea1" name="baseline_sea" value="500" required>
                        <label for="sea1">Often</label>

                        <input type="radio" id="sea2" name="baseline_sea" value="300">
                        <label for="sea2">Sometimes</label>

                        <input type="radio" id="sea3" name="baseline_sea" value="150">
                        <label for="sea3">Rarely</label>

                        <input type="radio" id="sea4" name="baseline_sea" value="50">
                        <label for="sea4">Once</label>
                    </div>
                </div>
                <div class="d-flex flex-column gap-2">
                    <button type="button" class="btn border-0 w-100" onclick="prevStep()">Back</button>
                    <button type="submit" class="btn btn-primary w-100">
                        {{ auth()->user()->onboarded ? 'Update Emissions' : 'Finish Onboarding' }}
                    </button>
                    @if(auth()->user()->onboarded)
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary w-100">Cancel</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Styles for this page only -->
<style>
    body {
        background-image: url('{{ asset('images/assets/whiteground.png') }}');
        font-family: 'Lato', sans-serif;
        overflow: hidden;
    }

    .onboard-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100dvh;
        padding: 1rem;
    }

    .onboard-card {
        background-color: white;
        padding: 2rem 1.5rem;
        border-radius: 20px;
        max-width: 420px;
        width: 100%;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    }

    .onboard-header h2 {
        font-family: 'Tilt Warp', cursive;
        color: #0039B3;
        font-size: 1.6rem;
        margin-bottom: 1.2rem;
    }

    .logo {
        height: 50px;
        margin-bottom: 0.5rem;
    }

    .progress-container {
        background-color: #e5e5e5;
        height: 6px;
        border-radius: 3px;
        overflow: hidden;
    }

    .progress-bar {
        background-color: #0039B3;
        height: 100%;
        width: 0%;
        transition: width 0.4s ease;
        border-radius: 3px;
    }

    .onboard-step {
        display: none;
    }

    .onboard-step.active-step {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    .option-group {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .option-group input[type="radio"] {
        display: none;
    }

    .option-group label {
        padding: 0.75rem 1rem;
        background-color: #f5f5f5;
        border: 2px solid transparent;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.2s ease;
        font-weight: 500;
    }

    .option-group input[type="radio"]:checked + label {
        border-color: #0039B3;
        background-color: #eaf1ff;
        color: #0039B3;
        font-weight: 600;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- For onboarding steps-->
<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.onboard-step');
    const progressBar = document.getElementById('progressBar');

    function showStep(index) {
        steps.forEach((step, i) => {
            step.classList.toggle('active-step', i === index);
        });

        const stepPercent = ((index + 1) / steps.length) * 100;
        progressBar.style.width = stepPercent + '%';

        currentStep = index;
    }

    function nextStep() {
        if (currentStep < steps.length - 1) {
            showStep(currentStep + 1);
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            showStep(currentStep - 1);
        }
    }

    showStep(0);
</script>
@endsection
