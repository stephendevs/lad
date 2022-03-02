<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ URL::to('/') }}" >


    <title>{{ config('app.name', 'Pacoss').' Dashboard - ' }}@yield('title')</title>

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('storage/defaults/favicon.png') }}" />

    <!-- Scripts -->
    <script src="{{ asset('jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}" defer></script>

    <!-- Required Page Js -->
    @yield('required-js')
    
    <script src="{{ asset('js/routes/routes.js') }}" defer></script>
    <script src="{{ asset('js/dashboard/default.js') }}" defer></script>
    <script src="{{ asset('js/dashboard/test.js') }}" defer></script>

    

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('font-awesome/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard/style.default.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/dashboard/themes/style.dark.themee.css') }}" rel="stylesheet" />
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Sidebar -->
        @include('dashboard.includes.sidebar.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" class="content-wrapper">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard.includes.navbar.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-primary page-heading">@yield('page-heading')</h1>
                        <div class="d-none d-sm-inline-block pr-5">
                            @yield('page-actions')
                        </div>
                        
                    </div>
                    <!-- End of Page Heading -->

                    <!--actual content --- use bootstrap row -->
                    @yield('content')

                </div>

            </div>
             <!-- End of Main Content -->

             <!-- Footer -->
             @include('dashboard.includes.footer')

        </div>
        <!-- End of Content Wrapper -->


    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Preloader -->
    <div id="preloader"></div>
    <!--// End Preloader -->

    <!-- Modals -->
    @include('dashboard.includes.modals.logoutModal')

    
    
</body>
</html>
