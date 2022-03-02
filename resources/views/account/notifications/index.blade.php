@extends('ldashboard::core.layouts.master')

@section('title')
    Schlr Dashboard - Profile
@endsection


@section('pageheading')
    Notifications
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mt-4">

                <div class="col-lg-2 r-col">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body p-1">
                                    <ul class="list-group list-group-flush" style="font-size: 13px;">
                                        <li class="list-group-item header">Manage Account</li>
                                        <li class="list-group-item">Active Sessions</li>
                                        <li class="list-group-item">Account Settings</li>
                                        <li class="list-group-item">Activity Log</li>
                                        <li class="list-group-item"><a href="{{ route('ldashboardAccountNotifications') }}">Notifications</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 mid-col">

                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="row">


                            </div>
                        </div>
                    </div>
            
                </div>

                <div class="col-lg-3 l-col">
                    <div class="row">
                        <div class="col-lg-12">
                            active sessions listed here
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
@endsection