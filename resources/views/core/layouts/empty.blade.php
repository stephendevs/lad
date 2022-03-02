<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('stephendevs/lad/img/favicon.png') }}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />


        @yield('requiredCss')
       

        <!-- Scripts -->
        <script src="{{ asset('jquery/jquery.min.js') }}" defer></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>


    </head>
    <body>
        

        @yield('content')
        @includeIf('lDbd::core.includes.footer.simple')
    </body>

</html>
