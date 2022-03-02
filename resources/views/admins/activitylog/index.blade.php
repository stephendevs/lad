@extends('lad::core.layouts.master')

@section('title' , 'Dashboard | '.$admin->username)

@section('pageHeading', $admin->username.' | Activity Log')

@section('pageActions')
<ul class="p-0">
    <li class="d-inline mr-2">
        <a href="{{ route('lad.admins') }}" class="btn btn-sm" data-toggle="modal" data-target="#createAdminModal"> <i class="fa fa-user-plus icon"></i><span class="ml-1">Register</span></a>
    </li>
    <li class="d-inline mr-2">
        <a href="" class="btn btn-sm refresh-admins"> <i class="fa fa-refresh icon"></i></a>
    </li>
</ul>
@endsection

@section('requiredJs')
    <script src="{{ asset('lad/js/admins.js') }}" defer></script>
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">

                <!-- Column 1 -->
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">Log Dates Here</div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            hello
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection