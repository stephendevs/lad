<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('stephendevs/lad/img/favicon.png') }}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Dashboard')</title>

        <!-- Styles please put this in the app-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

        <link href="{{ asset('lad/css/lad.css') }}" rel="stylesheet">
        <link href="{{ asset('lad/css/color/scheme/default.css') }}" rel="stylesheet" />
        @yield('requiredCss')


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('lad/js/lad.js') }}" defer></script>

        <!-- include required js files for specific pages -->
        @yield('requiredJs')


    </head>
    <body>

        <div class="d-flex" id="wrapper">

           

            <!-- Sidebar Wrapper-->
            <div id="sideBarWrapper" class="sidebar-wrapper sidebar-toggledd">
                @includeIf('lad::core.includes.navbar.sidebar.sidebar')
            </div>
            <!-- //Sidebar Wrapper -->

            <!-- Page Content -->
            <div id="content-wrapper" class=" content-wrapper d-flex flex-column body-bg-color">
                <div class="content">
                    <div class="alerts mt-1">
                        <div class="alert {{ session('deleted')  ? 'alert-warning' : 'alert-success' }} alert-dismissible fade {{ (session('updated') || session('deleted') || session('created') || session('edited') || session('success')) ? 'show' : '' }}" role="alert" id="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>
                              Operation Was Succesful: 
                          </strong>
                          <span class="message-holder">
                             @if (session('updated'))
                                {{ session('updated') }}
                            @elseif(session('created'))
                                {{ session('created') }}
                            @elseif(session('edited'))
                                {{ session('edited') }}
                            @elseif(session('deleted'))
                                {{ session('deleted') }}
                            @elseif(session('success'))
                                {{ session('success') }}
                            @endif
                          </span>
                        </div>
                    </div>
                     
                    <!-- navbar =-->
                    <header class="header container-fluid navbar-wrapper" id="header">
                        @include('lad::core.includes.navbar.navbar')
                    </header>
                    <!-- //navbar -->

                    <!-- Page Heading -->
                      <div class="container-fluid mb-4 pt-4">
                          <div class="row">
                              <div class="col-12 col-lg-6"><h1 class="h3 mb-0 text-gray-800 page-heading">@yield('pageHeading')</h1></div>
                              <div class="col-12 col-lg-6 mt-4 mt-lg-0 text-lg-right text-center pr-5 page-actions"> @yield('pageActions')</div>
                          </div>
                      </div>
                      <div class="container-fluid pl-5 page-actions"></div>

                    <!-- Begin Page Content -->
                    @yield('content')
                    
                </div>

               
                
            </div>
           
        </div>

       

    </body>

</html>
