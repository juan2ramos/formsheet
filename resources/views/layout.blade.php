<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">

	<meta name="description" content="">
	<meta name="author" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>

	<title>@yield('title') Formulario</title>
	<link href="" rel="stylesheet" type="text/css">
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500,500i,700,700i,900,900i|Boogaloo">
</head>
<body data-site="{{env('APP_URL')}}" id="body">
@yield('content')
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>