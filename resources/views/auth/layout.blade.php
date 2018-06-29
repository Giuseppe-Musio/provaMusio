<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name','UTassistant') }}</title>

	<!-- JavaScripts initializations and stuff -->
	<script src="{{ URL::asset('assets/js/jquery-3.2.1.min.js') }}"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

	<!-- Optional theme -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	@yield('style')
</head>

<body>
	<header>
		@include('auth.guestHeader')
	</header>
	<div id="main">
		@yield('content')
	</div>
		@include('front.footer')
</body>

</html>