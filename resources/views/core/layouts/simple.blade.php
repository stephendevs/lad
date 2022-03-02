<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('storage/defaults/favicon.png') }}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles -->
        <!-- Styles please put this in the app-->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('ldashboard/css/app.css') }}" rel="stylesheet">
        
        <link href="{{ asset('font-awesome/css/all.min.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{ asset('jquery/jquery.min.js') }}" defer></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('ldashboard/js/app.js') }}" defer></script>
	<!-- Required Page Js -->
    	@yield('requiredjs')


    </head>
    <body>

        <header class="header" id="header">
            @includeIf('lDbd::core.includes.navbar.mainNavBar')
        </header>

        <!-- Container -->
        <div class="container">

            <div class="content pt-1 pb-5">
                @yield('content')
            </div>

        </div>
        
        <!-- Footer -->
        @includeIf('lDbd::core.includes.footer.simple')
        <!-- //End Footer

    </body>

</html>
