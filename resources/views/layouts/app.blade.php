<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <!------------------>
    
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- CDN For Countries List -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Cropper.js for cropping images -->
    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet" />

    <!-- Scripts ------------------------------------------------------------------------------------------------------->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) <!-- Default Bootstrap. Replace later on final week. -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- This is charts.js -->
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script> <!-- Cropper.js script-->

    <!-- Select2 and jquery for country dropdown. -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- -------------------------------------------------------------------------------------------------------------->

    @stack('styles')
</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- This is here so that the bottom navbar will have no overlap on mobile views -->
    <div class="container mb-5"> 
    </div>

    @stack('scripts')


</body>
</html>
