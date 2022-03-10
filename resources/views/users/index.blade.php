@extends('lad::core.layouts.master')

@section('title')
    {{ config('lad.name', 'Lad').' | Users' }}
@endsection


@section('pageHeading', 'Users')

@section('content')
   <section>
       <div class="container-fluid">
           <div class="row">
               
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if (count($users))
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Created On</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><input type="checkbox" class="checkthis" /></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->user_type }}</td>
                                            <td>{{ ($user->created_at) ? $user->created_at->toFormattedDateString() : $user->created_at }}</td>
                                            <td>
                                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            </td>
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