<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!--linkeando con blade-->
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
        <!-- Squad theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('color/default.css') }}">

        
    </head>
    <body>
    	@yield('content')
        
    </body>
</html>
