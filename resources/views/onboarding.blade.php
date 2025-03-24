@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ auth()->user()->onboarded ? 'Update Emissions' : 'Complete Your Onboarding' }}</h2>
    <form method="POST" action="{{ url('/onboarding') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">How often do you eat meat?</label>
            <select name="baseline_food" class="form-control">
            <option value="100" {{ ($emissions->baseline_food ?? '') == 100 ? 'selected' : '' }}>Every day</option>

                <option value="75" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 75) ? 'selected' : '' }}>A few times a week</option>
                <option value="50" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 50) ? 'selected' : '' }}>Occasionally</option>
                <option value="25" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 25) ? 'selected' : '' }}>Rarely</option>
                <option value="0" {{ (old('baseline_food', $emissions->baseline_food ?? '') == 0) ? 'selected' : '' }}>Never</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you recycle?</label>
            <select name="baseline_waste" class="form-control">
                <option value="100" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 100) ? 'selected' : '' }}>Never</option>
                <option value="75" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 75) ? 'selected' : '' }}>Rarely</option>
                <option value="50" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 50) ? 'selected' : '' }}>Sometimes</option>
                <option value="25" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 25) ? 'selected' : '' }}>Most of the time</option>
                <option value="0" {{ (old('baseline_waste', $emissions->baseline_waste ?? '') == 0) ? 'selected' : '' }}>Always</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How much energy do you use?</label>
            <select name="baseline_energy" class="form-control">
                <option value="100" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 100) ? 'selected' : '' }}>High usage</option>
                <option value="75" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 75) ? 'selected' : '' }}>Moderate usage</option>
                <option value="50" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 50) ? 'selected' : '' }}>Low usage</option>
                <option value="25" {{ (old('baseline_energy', $emissions->baseline_energy ?? '') == 25) ? 'selected' : '' }}>Very low usage</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you use public transport?</label>
            <select name="baseline_land" class="form-control">
                <option value="100" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 100) ? 'selected' : '' }}>Never</option>
                <option value="75" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 75) ? 'selected' : '' }}>Rarely</option>
                <option value="50" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 50) ? 'selected' : '' }}>Sometimes</option>
                <option value="25" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 25) ? 'selected' : '' }}>Most of the time</option>
                <option value="0" {{ (old('baseline_land', $emissions->baseline_land ?? '') == 0) ? 'selected' : '' }}>Always</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How many flights do you take per year?</label>
            <select name="baseline_air" class="form-control">
                <option value="100" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 100) ? 'selected' : '' }}>More than 10</option>
                <option value="75" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 75) ? 'selected' : '' }}>5-10</option>
                <option value="50" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 50) ? 'selected' : '' }}>2-5</option>
                <option value="25" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 25) ? 'selected' : '' }}>1</option>
                <option value="0" {{ (old('baseline_air', $emissions->baseline_air ?? '') == 0) ? 'selected' : '' }}>None</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you use ships/cruises?</label>
            <select name="baseline_sea" class="form-control">
                <option value="100" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 100) ? 'selected' : '' }}>Frequently</option>
                <option value="75" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 75) ? 'selected' : '' }}>Sometimes</option>
                <option value="50" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 50) ? 'selected' : '' }}>Rarely</option>
                <option value="25" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 25) ? 'selected' : '' }}>Once</option>
                <option value="0" {{ (old('baseline_sea', $emissions->baseline_sea ?? '') == 0) ? 'selected' : '' }}>Never</option>
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
