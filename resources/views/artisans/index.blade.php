@extends('ldashboard::core.layouts.master')

@section('title', 'Dashboard | Artisans')

@section('pageHeading', 'Artisans')

@section('requiredCss')
@endsection
@section('requiredJs')
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mt-4">

                <div class="col-lg-12">
                    <div class="alert alert-primary alert-dismissible fade {{ session('message') ? 'show' : 'd-none' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ session('message') }}.
                    </div>
                </div>

                <div class="col-lg-2"></div>

               <div class="col-lg-6">
                   <div class="card">
                       <div class="card-body">
                        <a href="{{ route('lad.artisans.run', ['command' => 'clear-compiled']) }}" class="btn btn-md btn-primary m-1">Clear Compiled</a>
                        <a href="{{ route('lad.artisans.run', ['command' => 'cache:clear']) }}" class="btn btn-md btn-primary m-1">Clear Cache</a>
                        <a href="{{ route('lad.artisans.run', ['command' => 'config:clear']) }}" class="btn btn-md btn-primary m-1">Clear Config</a>
                        <a href="{{ route('lad.artisans.run', ['command' => 'view:clear']) }}" class="btn btn-md btn-primary m-1">Clear View Cache</a>
                        <a href="{{ route('lad.artisans.run', ['command' => 'view:clear']) }}" class="btn btn-md btn-primary m-1">Clear View Cache</a>
                       </div>
                   </div>
                   <div class="card">
                    <div class="card-body">
                     <a href="{{ route('lad.artisans.run', ['command' => 'view:cache']) }}" class="btn btn-md btn-primary m-1">Cache Views</a>
                     <a href="{{ route('lad.artisans.run', ['command' => 'config:cache']) }}" class="btn btn-md btn-primary m-1">Cache Config</a>
                    </div>
                </div>
               </div>

            </div>
        </div>
    </section>

@endsection
