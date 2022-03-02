@extends('ldashboard::core.layouts.master')

@section('title', 'Dashboard | CLI')

@section('pageHeading', 'Command Line')

@section('requiredCss')
    <link href="{{ asset('stephendevs/lad/css/cli.css') }}" rel="stylesheet">
@endsection
@section('requiredJs')
    <script src="{{ asset('stephendevs/lad/js/cli.js') }}" defer></script>
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-lg-7 cli-wrapper">
                    <form action="{{ route('lad.cli') }}" method="POST" id="cliForm" class="cli-form">
                        @csrf
                        <input type="text" name="command" value="{{ old('command') }}" placeholder="Enter Command e.g. config:clear" class="form-control cli-input" id="cliInput" required />
                    </form>
                    <div class="cli-output-wrapper">
                        <textarea  id="cliOutPut" cols="30" rows="10" class="form-control">
                        </textarea>
                    </div>
                </div>
                <div class="col-lg-3 quick-commands">
                    <h4>Quick Commands</h4>
                    <div class="commands">
                        <small class="badge badge-primary">route:clear</small>
                        <small class="badge badge-primary">route:cache</small>
                        <small class="badge badge-primary">storage:link</small>
                        <small class="badge badge-primary">config:clear</small>
                        <small class="badge badge-primary">config:cache</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
