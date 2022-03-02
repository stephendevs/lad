@extends('ldashboard::core.layouts.master')

@section('title')
    Schlr Dashboard - Profile
@endsection

@section('pageHeading')
    Account Settings
@endsection

@section('content')
    <section>
        <div class="container-fluid">
           <div class="row">

            <div class="col-lg-2 sticky-lg">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <nav class="nav">
                          <a class="nav-link" href="{{ route('lad.account') }}">Account</a>
                          <a class="nav-link" href="#">Account Settings</a>
                          <a class="nav-link" href="#">Authentication</a>
                          <a class="nav-link" href="#">Password Management</a>
                          <a class="nav-link" href="#">Color Scheme</a>
                        </nav>
                        
                    </div>
                </div>
            </div>

               <div class="col-lg-6">

                   

                   
               </div>

               <div class="col-lg-3">
                   <div class="card">
                       <div class="card-body"></div>
                   </div>
               </div>

           </div>
        </div>
    </section>
    
@endsection