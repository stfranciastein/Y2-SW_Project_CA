@extends('layouts.guest')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/assets/whiteground.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
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

    .form-check-label {
        font-size: 0.95rem;
    }

    .form-check-input {
        margin-right: 0.35rem;
    }
</style>

<div class="auth-container">
    <div class="auth-card text-center">
        <img src="{{ asset('images/assets/logo_blue.png') }}" alt="Logo" class="auth-logo mx-auto">
        <div class="auth-title">Welcome Back!</div>

        @if (session('status'))
            <div class="alert alert-success text-start" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus
                       placeholder="Email Address">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-start position-relative">
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password" required
                    placeholder="Password">

                <button type="button"
                        class="btn btn-sm btn-light position-absolute top-50 end-0 translate-middle-y me-2"
                        onclick="togglePassword()" tabindex="-1">
                    <i id="togglePasswordIcon" class="fa-solid fa-eye"></i>
                </button>

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>



            <div class="mb-3 text-start">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                           name="remember" id="remember"
                           {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-submit">Log In</button>

            <div class="auth-link">
                @if (Route::has('password.request'))
                    <a href="#">Forgot your password?</a>
                @endif
            </div>

            <div class="auth-link mt-2">
                New user? <a href="{{ route('register') }}">Sign up</a>
            </div>
        </form>
    </div>
</div>
<script>
    function togglePassword() {
        const input = document.getElementById("password");
        input.type = input.type === "password" ? "text" : "password";
    }
</script>
@endsection
