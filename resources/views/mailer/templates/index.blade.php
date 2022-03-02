@extends('lad::core.layouts.master')

@section('title')
    Lad | Mailer | Mail Templates
@endsection

@section('pageHeading', 'Mailer | Mail Templates')

@section('pageActions')
    <ul class="p-0">
        <li class="d-inline mr-2">
            <a href="{{ route('lad.mailer.templates') }}" class="btn btn-sm"><i class="fa fa-users icon"></i><span class="ml-1">Mail Templates</span></a>
        </li>
        <li class="d-inline mr-2">
            <a href="{{ route('lad.mailer') }}" class="btn btn-sm"><i class="fa fa-cog icon"></i><span class="ml-1">Settings</span></a>
        </li>
       
    </ul>
@endsection

@section('content')

    <section>
        <div class="container-fluid">
            <div class="row">
                
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-lg-3 mb-3">
                        <div class="card shadow-lg">
                            <div class=""><h6>Temlate Name</h6></div>
                            <iframe src="http://127.0.0.1:8000/dashboard/contact-us/render" frameborder="0" height="500px"></iframe>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

@endsection