@extends('lad::core.layouts.master')

@section('title')
    Dashboard | Admins
@endsection


@section('pageHeading', 'Admin | '.$admin->user->name)

@section('pageActions')
    <ul class="p-0">
        <li class="d-inline mr-2">
            <a href="{{ route('lad.admins') }}" class="btn btn-sm"><i class="fa fa-users icon"></i><span class="ml-1">Admins</span></a>
        </li>
        <li class="d-inline mr-2">
            <a href="{{ route('lad.admins') }}" class="btn btn-sm" data-toggle="modal" data-target="#createAdminModal"> <i class="fa fa-user-plus icon"></i><span class="ml-1">Register</span></a>
        </li>
    </ul>
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-2 sticky-lg">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ route('lad.admins') }}">Admins</a></li>
                                <li class="list-group-item"><a href="{{ route('lad.admins.permissions', ['username' => ($admin->user) ? $admin->user->name : $admin->first_name.$admin->lastname, 'id' => $admin->id ]) }}">Edit Permissions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card shadow-sm">
                        <div class="card-body">
                         <div class="row">
                             <div class="col-lg-3">
                                 <img src="{{ asset('stephendevs/lad/img/avator.jpg') }}" alt="avator" class="img-fluid rounded-circle shadow-sm" />
                             </div>
                             <div class="col-lg-9" style="text-transform: capitalize;">
                                <small>Username</small>
                                 <h1>{{ ($admin->user) ? $admin->user->name : $admin->first_name.' '.$admin->last_name }}</h1><hr />
                                 <h6>{{$admin->first_name.' '.$admin->last_name}}</h6>
                             </div>
                         </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 sticky-lg">
                    <div class="alert alert-primary alert-dismissible fade {{ (session('updated')) ? 'show' : 'd-none' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ session('updated') }}
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Password Management</h6>
                        </div>
                        <div class="card-body">
                            <p>
                                <a class="" data-toggle="collapse" href="#changePassword" aria-expanded="false" aria-controls="changePassword">
                                    Change Password
                                </a>
                            </p>
                            <div class="collapse" id="changePassword">
                                <form action="{{ route('lad.admins.change.password', ['id' => $admin->id]) }}" method="POST" >
                                    @csrf
                                    <input type="password" name="password" class="form-control mb-2" placeholder="Enter New Password" />
                                    <input type="text" name="password_confirmation" class="form-control mb-2" placeholder="Confirm Old Password" />
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                    <input type="submit" value="update" class="btn btn-success" />
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    
    

    @includeIf('ldashboard::core.includes.modals.createAdminModal', ['some' => 'data'])

@endsection