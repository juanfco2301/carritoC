<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>My Laravel - Dashboard</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('plugins/Bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

	@if(\Session::has('message'))
		@include('Admin.template.partials.message')
	@endif
	@include('Admin.template.partials.nav')

	@yield('content')

	@include('Admin.template.partials.footer')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js')}}"></script>
	<script src="{{ asset('plugins/Bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
