@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Module Title
                                    <p class="subtitle font-size-14 mb-0">Short module message</p>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Module Description
                                </h4>
                            </div>

                            <div class="card-body">
					         <p>module description</p>

                            </div>

                            
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Module Content
                                </h4>
                            </div>

                            <div class="card-body align-item-center">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="box">
                                          <div class="embed-responsive embed-responsive-16by9">
                                            <iframe src="https://www.youtube.com/embed/kN9SZtwP1ys" allowfullscreen=""></iframe>
                                          </div>
                        
                                          <div class="box-body">
                                           
                                            <p>module message and worksheet download </p>
                        
                                           
                        
                                            <div class="flexbox align-items-center mt-3">
                                              <a class="btn btn-sm btn-bold btn-primary" href="#">Download Worksheet</a>
                        
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                </div>

                            </div>

                            
                        </div>
                    </div>


                </div>


            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
