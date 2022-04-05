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

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Run Artisan Command</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lad.artisans.run') }}" method="POST" class="row">
                                @csrf
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="command" placeholder="Command eg vendor:publish" value="{{ old('command') }}" />
                                    <small class="text-danger">
                                        {{ $errors->first('command') }}
                                    </small>
                                </div>
                                <div class="col-lg-12">
                                    <small>Enter your options & arguments</small>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="options" placeholder="Options eg --force=true,--tag=lad-config" value="{{ old('options') }}" />
                                </div>
                              
                                <div class="col-lg-8 mt-4">
                                    <input type="reset" class="btn btn-md btn-warning d-inline-block" value="Cancel" />
                                    <input type="submit" class="btn btn-md btn-primary  d-" value="Run Command" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                         <a href="{{ route('lad.artisans.run.common', ['command' => 'clear-compiled']) }}" class="btn btn-md btn-primary m-1">Clear Compiled</a>
                         <a href="{{ route('lad.artisans.run.common', ['command' => 'cache:clear']) }}" class="btn btn-md btn-primary m-1">Clear Cache</a>
                         <a href="{{ route('lad.artisans.run.common', ['command' => 'config:clear']) }}" class="btn btn-md btn-primary m-1">Clear Config</a>
                         <a href="{{ route('lad.artisans.run.common', ['command' => 'view:clear']) }}" class="btn btn-md btn-primary m-1">Clear View Cache</a>
                         <a href="{{ route('lad.artisans.run.common', ['command' => 'view:clear']) }}" class="btn btn-md btn-primary m-1">Clear View Cache</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    hello
                </div>

            </div>
        </div>
    </section>

@endsection
