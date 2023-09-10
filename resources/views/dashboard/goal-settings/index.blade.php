@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row fx-element-overlay">
                    <form action="">

                    <div class="row">
                        <div class="col-12">														
                            <div class="box no-shadow mb-0 bg-transparent">
                                <div class="box-header no-border px-0">
                                    <h4 class="box-title">Current Running Courses</h4>	
                                    <ul class="box-controls pull-right d-md-flex d-none">
                                      <li>
                                        <button class="btn btn-primary-light px-10">View All</button>
                                      </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="box pull-up">
                                <div class="box-body">	
                                    <div class=" rounded">
                                        <input type="checkbox" >
                                        <label for="">physical exercise</label>
                                    </div>
                                    <p class="mb-0 font-size-18">Quisque a felis quis</p>
                                    <p class="mb-0 font-size-18">Course A-Z</p>
                                    <div class="d-flex justify-content-between mt-30">
                                        <div>
                                            <p class="mb-0 text-fade">Author</p>
                                            <p class="mb-0">Maical Doe</p>
                                        </div>
                                        <div>
                                            <p class="mb-5 font-weight-600">55%</p>
                                            <div class="progress progress-sm mb-0 w-100">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>								
                                </div>					
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="box pull-up">
                                <div class="box-body">	
                                    <div class="bg-warning rounded">
                                        <h5 class="text-white text-center p-10">Programming</h5>
                                    </div>
                                    <p class="mb-0 font-size-18">Morbi finibus purus</p>
                                    <p class="mb-0 font-size-18">Course A-Z</p>
                                    <div class="d-flex justify-content-between mt-30">
                                        <div>
                                            <p class="mb-0 text-fade">Author</p>
                                            <p class="mb-0">Maical Doe</p>
                                        </div>
                                        <div>
                                            <p class="mb-5 font-weight-600">65%</p>
                                            <div class="progress progress-sm mb-0 w-100">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>								
                                </div>					
                            </div>
                        </div>

                        
                    </div>
                </form>

                 

                   

                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('layouts.dashboard.modals.goal-settings.modal')
@endsection
