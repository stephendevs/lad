@extends('ldashboard::core.layouts.master')

@section('title')
    Actvity Log 
@endsection


@section('pageHeading')
    Account | Activity Log
@endsection

@section('pageActions')
@endsection

@section('content')
    <section>
        <div class="container-fluid">
           <div class="row">

               <div class="col-lg-3">
                   <div class="row">
                       <div class="col-lg-3">
                            <img src="{{ asset('lad/img/avator.jpg') }}" alt="avator" class="img-fluid rounded-circle mb-3 ml-3 w-100" />
                       </div>
                       <div class="col-lg-9 pt-2 text-capitalize">
                            <h3>{{ $account->userable->first_name.' '.$account->userable->first_name }}</h3>
                            <small><b>{{ $account->name }}</b></small>
                       </div>
                   </div>
                   <hr />
               </div>

               <div class="col-lg-6 p-0">
                   <div class="card">
                       <div class="card-body">
                           @if (count($activitylog))
                               <div class="activitylog">
                                   @foreach ($activitylog as $log)
                                    <div class="log p-3">
                                        @if ($log->content_type == 'html')
                                            {!! $log->activity_log !!}
                                        @else
                                            {{ $log->activity_log }}
                                        @endif
                                    </div>
                                  @endforeach
                               </div>
                           @else
                               
                           @endif
                       </div>
                   </div>
               </div>

           </div>
        </div>
    </section>
    
@endsection