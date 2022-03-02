@extends('lad::core.layouts.master')

@section('title')
    Lad | Mailer
@endsection

@section('pageHeading', 'Mailer')

@section('pageActions')
    <ul class="p-0">
        <li class="d-inline mr-2">
            <a href="{{ route('lad.mailer.templates') }}" class="btn btn-sm"><i class="fa fa-folder icon"></i><span class="ml-1">Mail Templates</span></a>
        </li>
        <li class="d-inline mr-2">
            <a href="{{ route('lad.admins') }}" class="btn btn-sm"><i class="fa fa-cog icon"></i><span class="ml-1">Settings</span></a>
        </li>
       
    </ul>
@endsection

@section('content')

    <section>
        <div class="container-fluid">
            <div class="row">

                
            </div>
        </div>
    </section>

@endsection