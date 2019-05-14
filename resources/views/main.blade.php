<!DOCTYPE html>
<html lang="en">
<head>
	<meta>
	<title>@yield('title') | Umbook</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap4/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/easyAutocomplete/easy-autocomplete.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/easyAutocomplete/asy-autocomplete.themes.min.css')}}">

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@include('nav')
@include('flash::message')
<div class="container mt-3">
	<section>
		@yield('content')
	</section>
</div>
<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
<script src="{{asset('plugins/bootstrap4/js/bootstrap.js')}}"></script>
<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
<script src="{{asset('plugins/trumbowyg/dist/trumbowyg.js')}}"></script>
<script src="{{asset('plugins/fontawesome/js/all.js')}}"></script>
<script src="{{asset('plugins/easyAutocomplete/jquery.easy-autocomplete.js')}}"></script>
@yield('js')
</body>
</html>