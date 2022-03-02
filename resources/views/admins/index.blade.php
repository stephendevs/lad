@extends('lad::core.layouts.master')

@section('title' , 'Dashboard | Admins')

@section('pageHeading', 'Admins')

@section('pageActions')

@endsection


@section('content')
    <section>
        <div class="container-fluid">
            <div class="row" data-url="{{ route('lad.admins') }}">
                <!-- Column 1 -->
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">

                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @if (count($admins))
                                <div class=" table-responsive">
                                    <table class="table table-striped table-inverse">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th></th>
                                                <th>Details</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                <tr>
                                                    <td width="50px">
                                                        <img src="{{ asset('stephendevs/lad/img/avator.jpg') }}" alt="avator" class="img-fluid rounded-circle" />
                                                   </td>
                                                    <td>
                                                       <span class="d-block text-primary">
                                                            <a href="{{ ($admin->user != null) ? route('lad.admins.show', ['username' => $admin->user->name, 'id' => $admin->id]) : route('lad.admins.show', ['username' => str_replace(' ', '.',  $admin->first_name.''.$admin->last_name), 'id' => $admin->id]) }}"><h6 class="mb-0">{{ ($admin->user) ? $admin->user->name : '' }}</h6></a>
                                                       </span>
                                                       <small class="d-block">{{ ($admin->user) ? $admin->user->email : '' }}</small>
                                                       <small class="text-success">{{ ($admin->is_super) ? __('Super Account') : __('')}}</small>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-danger delete-admin" href="{{ route('lad.admins.destroy' , ['id' => $admin->id]) }}"><i class="fa fa-trash"></i></a>
                                                        <a class="btn btn-sm btn-primary" href="{{ ($admin->user != null) ? route('lad.admins.edit', ['username' => $admin->user->name, 'id' => $admin->id]) : route('lad.admins.edit', ['username' => str_replace(' ', '.',  $admin->first_name.''.$admin->last_name), 'id' => $admin->id]) }}"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            @else
                                
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Colum 3 -->
                <div class="col-lg-4">
                    <div class="alert alert-primary alert-dismissible fade {{ (session('created')) ? 'show' : 'd-none' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ session('created') }}
                    </div>
                    <div class="alert alert-danger alert-dismissible fade {{ (session('deleted')) ? 'show' : 'd-none' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ session('deleted') }}.
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Create New Admin User</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('lad.admins.store')}}" method="POST" class="row" class="" id="hello">
                                @csrf

                                <div class="col-lg-6 mb-2">
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ old('first_name') }}" />
                                    <small class="error-first_name text-danger error" id="errorUsername">
                                        {{ $errors->first('first_name') }}
                                    </small>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ old('last_name') }}" />
                                    <small class="error-last_name text-danger error" id="errorUsername">
                                        {{ $errors->first('last_name') }}
                                    </small>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Enter Username" />
                                    <small class="error-username text-danger error" id="errorUsername">
                                        {{ $errors->first('username') }}
                                    </small>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email" required />
                                    <small class="error-email text-danger error" id="errorEmail">
                                        {{ $errors->first('email') }}
                                    </small>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                                    <small class="error-password text-danger error" id="errorPassword">
                                        {{ $errors->first('password') }}
                                    </small>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="passwordConfirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" />
                                    <small class="error-password-confirmation text-danger error"></small>
                                </div>

                                <div class="col-12 mt-2 form-group form-check d-none">
                                    <input type="checkbox" name="alert" class="form-input-check" />
                                    <label for="alert" class="form-check-label">Send Notification To New Admin</label>

                                </div>

                                <div class="col-lg-12">
                                    <small class="text-success success"></small>
                                </div>


                                <div class="col-12 mt-5">
                                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary">Cancel</button>
                                    <button type="reset" class="btn btn-sm btn-warning">Reset Form</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection