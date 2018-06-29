<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','UTassistant') }}</title>

    <!-- JavaScripts initializations and stuff -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-migrate-1.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.BlockUI.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/plugin/video/videojs-ie8.min.js') }}"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/video/video-js.css') }}">
    @yield('style')
</head>

<body>
    <header>
        @yield('navbar')
    </header>

    <div class="container-fluid">
        @yield('content')
    </div>

    @include('front.footer')
</body>
</html>
