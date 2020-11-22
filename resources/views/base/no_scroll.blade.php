<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="/favicon.ico">
	<title>Renova</title>
	@css("app")
	@stack("head")
</head>
@section("body_tag")
	<body class="bg-navy">
@show
	<div id="app">
		<div class="no-scroll">
			@include("component.navbar")
			<div class="no-scroll-container">
				@yield("body")
			</div>
		</div>
	</div>
	@js("app")
	@stack("scripts")
</body>
</html>
