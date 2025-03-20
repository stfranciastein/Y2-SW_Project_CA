@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Complete Your Onboarding</h2>
    <form method="POST" action="{{ url('/onboarding') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">How often do you eat meat?</label>
            <select name="baseline_food" class="form-control">
                <option value="100">Every day</option>
                <option value="75">A few times a week</option>
                <option value="50">Occasionally</option>
                <option value="25">Rarely</option>
                <option value="0">Never</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you recycle?</label>
            <select name="baseline_waste" class="form-control">
                <option value="0">Never</option>
                <option value="25">Rarely</option>
                <option value="50">Sometimes</option>
                <option value="75">Most of the time</option>
                <option value="100">Always</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How much energy do you use?</label>
            <select name="baseline_energy" class="form-control">
                <option value="100">High usage</option>
                <option value="75">Moderate usage</option>
                <option value="50">Low usage</option>
                <option value="25">Very low usage</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you use public transport?</label>
            <select name="baseline_land" class="form-control">
                <option value="100">Never</option>
                <option value="75">Rarely</option>
                <option value="50">Sometimes</option>
                <option value="25">Most of the time</option>
                <option value="0">Always</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How many flights do you take per year?</label>
            <select name="baseline_air" class="form-control">
                <option value="100">More than 10</option>
                <option value="75">5-10</option>
                <option value="50">2-5</option>
                <option value="25">1</option>
                <option value="0">None</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">How often do you use ships/cruises?</label>
            <select name="baseline_sea" class="form-control">
                <option value="100">Frequently</option>
                <option value="75">Sometimes</option>
                <option value="50">Rarely</option>
                <option value="25">Once</option>
                <option value="0">Never</option>
            </select>
        </div>

        <button type="submit" class="btn btn-dark">Finish Onboarding</button>
    </form>
</div>
@endsection
