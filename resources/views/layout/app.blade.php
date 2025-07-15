<!DOCTYPE html>
<html lang="en">
<head>
	@yield('title')
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.png') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    @yield('css')
</head>
<body>
	
	<!-- Header -->
    @include('layout.header')
	<!-- End Header -->

    <!-- Content  -->
    @yield('content')
    <!-- End Content -->
	<!-- Footer -->
	@include('layout.footer')
    <!-- Footer -->

	<script src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	
	{{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}

</body>
</html>