@extends('ldashboard::core.layouts.master')

@section('title')
    Schlr Dashboard - Profile
@endsection


@section('pageHeading')
    Account Profile
@endsection

@section('pageActions')
@endsection

@section('content')
    <section>
        <div class="container-fluid">
           <div class="row">

            <div class="col-lg-3">
                <div class="col-12">
                    <img src="{{ asset('lad/img/avator.jpg') }}" alt="avator" class="img-fluid rounded-circle mb-3 ml-3 w-75" />
                    <form action="" class="edit-account-avator">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-camera"></i>
                        </label>
                        <input id="file-upload" type="file"/>
                    </form>
                </div>
                <div class="pl-3">
                    <h1 class="mb-2">{{$account->userable->last_name.' '.$account->userable->first_name}}</h1>
                    <h6>{{ $account->name }}</h6>
                    <hr />
                    <small><b>Social Links</b></small><br />
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a><br />
                    <small><b>Account Age</b></small><span class="badge badge-primary ml-2">20 Yrs</span><hr />

                    <a href="" class="btn btn-sm btn-success mt-2 w-50"><i class="fa fa-edit"></i> Edit Profile</a><hr />
                </div>
                
            </div>
            
            <div class="col-lg-6 p-0">
                <div class="card">
                    <div class="card-body">
                        <h4>Account Role <small>Your Roles</small></h4>
                        @if (count($account->roles))
                            @foreach ($account->roles as $role)
                                <small class="text-capitalize pr-4">{{ $role->role }}</small>
                            @endforeach
                        @else
                            
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        hello
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="list-group custom-list-group pl-5 pr-5">
                    <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-cog"></i> Settings</a>
                    <a href="{{route('lad.account.activitylog')}}" class="list-group-item list-group-item-action"><i class="fa fa-list"></i> Activity Log</a>
                    <a href="#" class="list-group-item list-group-item-action">Authentication</a>
                </div>
            </div>

            
             

               <div class="col-lg-3 d-none">
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