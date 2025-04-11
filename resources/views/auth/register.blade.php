@extends('layouts.guest')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/assets/whiteground.png') }}');
        font-family: 'Lato', sans-serif;
    }

    .auth-container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1.5rem;
    }

    .auth-card {
        background-color: #ffffff;
        padding: 2.5rem 2rem;
        border-radius: 20px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    }

    .auth-logo {
        width: 60px;
        height: 60px;
        object-fit: contain;
        margin-bottom: 1rem;
    }

    .auth-title {
        font-family: 'Tilt Warp', cursive;
        font-size: 2rem;
        color: #0039B3;
        margin-bottom: 1.5rem;
    }

    .form-control {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }

    .btn-submit {
        border-radius: 12px;
        padding: 0.75rem;
        font-weight: bold;
        background-color: #0039B3;
        color: #fff;
        border: none;
        width: 100%;
        font-family: 'Tilt Warp', cursive;
        font-size: 1.1rem;
    }

    .auth-link {
        margin-top: 1rem;
        text-align: center;
        font-size: 0.9rem;
    }

    .auth-link a {
        color: #0039B3;
        font-weight: bold;
        text-decoration: none;
    }

    .auth-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="auth-container">
    <div class="auth-card text-center">
        <img src="{{ asset('images/assets/logo_blue.png') }}" alt="Logo" class="auth-logo mx-auto">
        <div class="auth-title">Create an Account</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3 text-start">
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                       placeholder="Full Name">
                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email"
                       placeholder="Email">
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <select id="country" name="country"
                        class="form-control @error('country') is-invalid @enderror"
                        required>
                    <option value="" disabled selected>Select Country</option>
                    <option value="Ireland" {{ old('country') == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                    <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                    <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                    <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                </select>
                @error('country')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3 text-start">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password"
                       placeholder="Password">
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <input id="password-confirm" type="password"
                       class="form-control"
                       name="password_confirmation" required
                       placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn-submit">Register</button>

            <div class="auth-link">
                Already registered?
                <a href="{{ route('login') }}">Log in</a>
            </div>
        </form>
    </div>
</div>
@endsection
