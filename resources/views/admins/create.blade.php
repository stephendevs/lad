@extends('lad::core.layouts.master')

@section('title', 'Lad | Admins | Create')

@section('pageHeading', 'Create New Admin')

@section('requiredJs')
    <script src="{{ asset('stephendevs/lad/js/admin.js') }}" defer></script>
@endsection


@section('pageActions')

@endsection


@section('content')
<section class="create-admin-page" id="createAdminPage">

    <div class="container-fluid">
        <div class="row mt-4">

            <!-- Column 1 -->
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-lg-4">
                <div class="card">
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

            <!-- Column 3 -->
            <div class="col-lg-3">
                <div class="alert alert-primary alert-dismissible fade {{ (session('created')) ? 'show' : 'd-none' }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Holy guacamole!</strong> {{ session('created') }}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection