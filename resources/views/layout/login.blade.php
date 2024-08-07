<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template,  https://imransdesign.com/">

	<!-- title -->
	<title>@yield('title')</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset("assets/img/favicon.png") }}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset("assets/css/all.min.css") }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css") }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset("assets/css/owl.carousel.css") }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ asset("assets/css/magnific-popup.css") }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset("assets/css/animate.css") }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ asset("assets/css/meanmenu.min.css") }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset("assets/css/responsive.css") }}">

</head>
<body style="background-color: #07212e">
	<h1 style="text-align: center ; color:#F28123 ; padding-top:50px; margin-bottom:100px">@yield('h1')</h1>
    @yield('content')
	<!-- jquery -->
	<script src="{{ asset("assets/js/jquery-1.11.3.min.js")}}"></script>
	<!-- bootstrap -->
	<script src="{{ asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
	<!-- count down -->
	<script src="{{ asset("assets/js/jquery.countdown.js")}}"></script>
	<!-- isotope -->
	<script src="{{ asset("assets/js/jquery.isotope-3.0.6.min.js")}}"></script>
	<!-- waypoints -->
	<script src="{{ asset("assets/js/waypoints.js")}}"></script>
	<!-- owl carousel -->
	<script src="{{ asset("assets/js/owl.carousel.min.js")}}"></script>
	<!-- magnific popup -->
	<script src="{{ asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
	<!-- mean menu -->
	<script src="{{ asset("assets/js/jquery.meanmenu.min.js")}}"></script>
	<!-- sticker js -->
	<script src="{{ asset("assets/js/sticker.js")}}"></script>
	<!-- main js -->
	<script src="{{ asset("assets/js/main.js")}}"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>