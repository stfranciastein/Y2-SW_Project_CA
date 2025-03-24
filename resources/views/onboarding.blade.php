@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ auth()->user()->onboarded ? 'Update Emissions' : 'Complete Your Onboarding' }}</h2>
    <form method="POST" action="{{ url('/onboarding') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">How often do you eat meat?</label>
            <select name="baseline_food" class="form-control">
                <option value="1200" {{ ($emissions->baseline_food ?? '') == 1200 ? 'selected' : '' }}>Every day (1200 kg CO2/year)</option>
                <option value="800" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 800) ? 'selected' : '' }}>A few times a week (800 kg CO2/year)</option>
                <option value="400" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 400) ? 'selected' : '' }}>Occasionally (400 kg CO2/year)</option>
                <option value="100" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 100) ? 'selected' : '' }}>Rarely (100 kg CO2/year)</option>
                <option value="0" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 0) ? 'selected' : '' }}>Never (0 kg CO2/year)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you recycle?</label>
            <select name="baseline_waste" class="form-control">
                <option value="400" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 400) ? 'selected' : '' }}>Never (400 kg CO2/year)</option>
                <option value="300" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 300) ? 'selected' : '' }}>Rarely (300 kg CO2/year)</option>
                <option value="200" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 200) ? 'selected' : '' }}>Sometimes (200 kg CO2/year)</option>
                <option value="100" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 100) ? 'selected' : '' }}>Most of the time (100 kg CO2/year)</option>
                <option value="0" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 0) ? 'selected' : '' }}>Always (0 kg CO2/year)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How much energy do you use?</label>
            <select name="baseline_energy" class="form-control">
                <option value="1000" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 1000) ? 'selected' : '' }}>High usage (1000 kg CO2/year)</option>
                <option value="750" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 750) ? 'selected' : '' }}>Moderate usage (750 kg CO2/year)</option>
                <option value="500" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 500) ? 'selected' : '' }}>Low usage (500 kg CO2/year)</option>
                <option value="250" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 250) ? 'selected' : '' }}>Very low usage (250 kg CO2/year)</option>
                <option value="0" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 0) ? 'selected' : '' }}>None (0 kg CO2/year)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you use public transport?</label>
            <select name="baseline_land" class="form-control">
                <option value="600" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 600) ? 'selected' : '' }}>Never (600 kg CO2/year)</option>
                <option value="450" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 450) ? 'selected' : '' }}>Rarely (450 kg CO2/year)</option>
                <option value="300" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 300) ? 'selected' : '' }}>Sometimes (300 kg CO2/year)</option>
                <option value="150" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 150) ? 'selected' : '' }}>Most of the time (150 kg CO2/year)</option>
                <option value="0" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 0) ? 'selected' : '' }}>Always (0 kg CO2/year)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How many flights do you take per year?</label>
            <select name="baseline_air" class="form-control">
                <option value="1200" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 1200) ? 'selected' : '' }}>More than 10 (1200 kg CO2/year)</option>
                <option value="900" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 900) ? 'selected' : '' }}>5-10 (900 kg CO2/year)</option>
                <option value="500" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 500) ? 'selected' : '' }}>2-5 (500 kg CO2/year)</option>
                <option value="100" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 100) ? 'selected' : '' }}>1 (100 kg CO2/year)</option>
                <option value="0" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 0) ? 'selected' : '' }}>None (0 kg CO2/year)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you use ships/cruises?</label>
            <select name="baseline_sea" class="form-control">
                <option value="500" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 500) ? 'selected' : '' }}>Frequently (500 kg CO2/year)</option>
                <option value="300" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 300) ? 'selected' : '' }}>Sometimes (300 kg CO2/year)</option>
                <option value="150" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 150) ? 'selected' : '' }}>Rarely (150 kg CO2/year)</option>
                <option value="50" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 50) ? 'selected' : '' }}>Once (50 kg CO2/year)</option>
                <option value="0" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 0) ? 'selected' : '' }}>Never (0 kg CO2/year)</option>
            </select>
        </div>

        <div class="d-flex flex-column align-items-start">
            <button type="submit" class="btn btn-dark">
                {{ auth()->user()->onboarded ? 'Update Emissions' : 'Finish Onboarding' }}
            </button>

            @if(auth()->user()->onboarded)
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary mt-2">
                    Cancel
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
