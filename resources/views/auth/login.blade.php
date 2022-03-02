<!-- Admin authentication to the dashboard -->
@extends('ldashboard::core.layouts.empty')

@section('title')
     Lad | Login
@endsection

@section('requiredCss')
<link href="{{ asset('lad/css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="fixed-top heading" id="heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{ asset('lad/img/logo.png') }}" class="mb-2" alt="lad logo">
                <h3>Login To Your  Dashboard</h3>
            </div>
        </div>
    </div>
</section>
<section class="auth">
    <div class="container">
        <div class="row">

            

            <div class="col-lg-4 offset-lg-1">
                <img src="{{ asset('lad/img/features.svg') }}" alt="" class="img-fluid">
            </div>

            <div class="col-lg-4 offset-lg-1  pt-5">
                <div class="login-form-wrapper p-5 shadow-sm" id="loginFormWrapper">
                    @include('lad::core.includes.forms.loginForm', ['some' => 'data'])
                </div>
            </div>


        </div>
    </div>
</section>
<footer class="fixed-bottom developer shadow-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-right">
                <h6 class="mb-0">Developed by</h6>
                <small>
                    <a href="https://github.com/stephendevs" target="_blank">Stephendevs</a>
                </small>
            </div>
            <div class="col-lg-3 text-left links">
                <a href="https://twitter.com/stephendevs" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://github.com/stephendevs" target="_blank" class="google-plus"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/stephendevs" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="https://www.buymeacoffee.com/stephendevs" target="_blank" class="linkedin"><i class="fa fa-coffee"></i></a>
            </div>
            <div class="col-lg-3 text-right">
                <h6 class="mb-0">Powered by</h6>
                <small>
                    <a href="">Laravel</a>
                </small>
            </div>
            <div class="col-lg-3 text-left links">
                <a href="https://github.com/laravel" target="_blank" class="google-plus"><i class="fa fa-github"></i></a>
            </div>
        </div>
    </div>
</footer>
@endsection