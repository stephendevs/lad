@extends('lad::core.layouts.master')

@section('title')
    System Settings
@endsection

@section('pageHeading', 'System Settings')


@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="{{ route('lad.settings.change') }}" method="POST" class="" enctype="multipart/form-data" id="optionsForm" >
                        @csrf
                       <div class="row">

                        <!-- Lad Settings -->
                           <div class="col-lg-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row">

                                            <!-- Dashboard Logo -->
                                            <div class="col-lg-12"><h6>Dashboard Logo | Icon</h6><hr /></div>
                                            <div class="col-lg-2">
                                                @if (array_key_exists('dashboard_logo', $options))
                                                <img src="{{ asset($options['dashboard_logo'] ?? 'lad/img/logo.png') }}" alt="" class="img-fluid" id="ladLogoHolder" />
                                                @endif
                                                <input type="file" name="dashboard_logo" id="ladLogo" class="mt-4" />
                                            </div>
                                            <div class="col-lg-8">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                           </div>
                           <!-- // Lad Settings // -->

                           <!-- Other Settings views -->
                           <!-- / Other Settings views -->

                           <div class="col-lg-12">
                               <div class="card mt-3 shadow-sm">
                                   <div class="card-body">
                                       <input type="submit" value="Update" class="btn btn-primary btn-md float-right" />
                                   </div>
                               </div>
                           </div>

                       </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    

    @includeIf('ldashboard::core.includes.modals.createAdminModal', ['some' => 'data'])



@endsection