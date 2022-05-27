@extends('lad::core.layouts.master')

@section('title')
    {{ config('lad.name', 'Lad').' | Users' }}
@endsection


@section('pageHeading', 'Users')

@section('pageActions')
@endsection

@section('content')
   <section>
       <div class="container-fluid">
           <div class="row">

            <div class="col-lg-2 pr-3">
                <div class="list-group custom-list-group">
                    <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#createUser"><i class="fa fa-user-plus"></i> Create User</a>
                    <a href="{{route('lad.account.activitylog')}}" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> Administrators</a>
                </div>
            </div>

            <div class="col-lg-7 p-0">
                <div class="card">
                    <div class="card-body">
                        @if (count($users))
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User</th>
                                    <th>Created On</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr style="font-size: 14px;">
                                        <td><input type="checkbox" class="checkthis" /></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ __($user->userType) }}</td>
                                        <td>{{ ($user->created_at) ? $user->created_at->toFormattedDateString() : $user->created_at }}</td>
                                        @if ($user->id == auth()->user()->id)
                                        <td>
                                            <a href="{{ route('lad.account') }}" class="btn btn-sm btn-success btn-sm">You</a>
                                        </td>
                                        @else
                                        <td>
                                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a>
                                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
               
           </div>
       </div>
   </section>
@endsection


<!-- Modal -->
<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('lad.users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="name">Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Username" value="{{ old('name') }}">
                    <div class="p-1">
                        <small class="error mb-3 text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <label for="email" class="">Email</label>
                    <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" class="form-control">
                    <div class="p-1">
                        <small class="error mb-3 text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <label for="password" class="">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control" />
                    <div class="p-1">
                        <small class="error mb-3 text-danger">{{ $errors->first('password') }}</small>
                    </div>

                    <label for="passwordConfirmation" class="">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" />
                    <small class="error-password-confirmation text-danger error"></small><br />

                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="alert" id="">
                        Notify User
                      </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>