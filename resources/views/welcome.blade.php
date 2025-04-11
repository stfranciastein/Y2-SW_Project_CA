<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Bootstrap CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-image: url('{{ asset('images/assets/background.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 0.6s ease-in-out forwards;
            animation-delay: 0.3s;
        }


        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .logo-circle {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="text-center p-5" style="width: 300px;">
        @if (Route::has('login'))
            <div class="d-flex flex-column gap-3">
            <img src="{{ asset('images/assets/logo_white.png') }}" class="logo-circle mx-auto" alt="Logo" />

                <h1 class="text-light">PLANIT</h1>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-dark w-100 rounded-pill fade-in fw-bold">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="fade-in">
                        @csrf
                        <button type="submit" class="btn w-100 rounded-pill text-white border-2 border-white fw-bold">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark w-100 rounded-pill fade-in fw-bold">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn border-2 border-white text-light w-100 rounded-pill fade-in fw-bold">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
