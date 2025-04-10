<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('images/assets/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="text-center bg-white p-5 rounded shadow" style="width: 300px;">
        @if (Route::has('login'))
            <div class="d-flex flex-column gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-dark w-100">Dashboard</a>
                    <p>or
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark w-100">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-dark w-100">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
