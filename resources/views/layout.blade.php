<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">

	<meta name="description" content="">
	<meta name="author" content="Mike">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>

	<title>@yield('title') Formulario</title>
	<link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">

</head>
<body>
@yield('content')
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
