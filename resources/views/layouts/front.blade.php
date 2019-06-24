<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('css/home.css?v=1.0.1') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @auth
            @include('layouts.front.navbars.navs.auth')
            {{-- , ['cates' => $cates]) --}}
        @else
            @include('layouts.front.navbars.navs.guest')
            {{-- , ['cates' => $cates]) --}}
        @endauth

        @yield('content')

        @auth
            @include('layouts.front.footers.auth')
        @else
            @include('layouts.front.footers.guest')
        @endauth
    </div>

    <!-- Core -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/headroom/headroom.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('js/front.js?v=1.0.1') }}"></script>
</body>
</html>
