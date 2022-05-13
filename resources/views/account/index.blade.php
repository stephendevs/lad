@extends('ldashboard::core.layouts.master')

@section('title')
    Schlr Dashboard - Profile
@endsection


@section('pageHeading')
    Account Profile
@endsection

@section('content')
    <section>
        <div class="container-fluid">
           <div class="row">

            <div class="col-lg-12">
                <div class="alert alert-primary alert-dismissible fade {{ (session('updated')) ? 'show' : 'd-none' }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Holy guacamole!</strong> {{ session('updated') }}
                </div>
            </div>

            <div class="col-lg-2 sticky-lg">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <nav class="nav">
                          <a class="nav-link" href="#">Account</a>
                          <a class="nav-link" href="{{ route('lad.account.settings') }}">Account Settings</a>
                          <a class="nav-link" href="#">Authentication</a>
                          <a class="nav-link" href="#">Password Management</a>
                          <a class="nav-link" href="#">Color Scheme</a>
                        </nav>
                        
                    </div>
                </div>
            </div>

               <div class="col-lg-7">

                   <div class="card shadow-sm">
                       <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="{{ asset('lad/img/avator.jpg') }}" alt="avator" class="img-fluid rounded-circle shadow-sm" />
                            </div>
                            <div class="col-lg-9" style="text-transform: capitalize;">
                                <h1>{{ $account->name }}</h1><hr />
                                <h6>{{$account->userable->last_name.' '.$account->userable->first_name}}</h6>
                            </div>
                        </div>
                       </div>
                   </div>

                    <!-- Authentication detial -->
                    <div class="card d-none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12"><h6>Personal Details</h6><hr /></div>
                                <div class="col-lg-12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card d-none">
                        <div class="card-body">
                             <!-- Color Scheme Details -->
                             @include('lad::core.includes.row.colorScheme')
                        </div>
                    </div>

                   
               </div>

               <div class="col-lg-3">
                   <div class="card">
                       <div class="card-header">
                           <h6 class="card-title mb-0">Change Password</h6>
                       </div>
                       <div class="card-body">
                           <form action="{{ route('lad.account.change.password') }}" method="POST">
                               @csrf
                               <input type="password" name="password" class="form-control mb-2" placeholder="Enter New Password" />
                               <input type="text" name="password_confirmation" class="form-control mb-2" placeholder="Confirm Old Password" />
                               <small class="text-danger">{{ $errors->first('password') }}</small><hr />
                               <input type="submit" value="update" class="btn btn-success" />
                           </form>
                       </div>
                   </div>
               </div>

           </div>
        </div>
    </section>
    
@endsection