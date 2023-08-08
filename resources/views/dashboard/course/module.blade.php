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
                                <h4 class="card-title"> {{$module_info['title']}}
                                   
                                    <p class="subtitle font-size-14 mb-0">
                                        <b>Learning objectives:</b> At the end of this module, you will be able to
                                    </p>

                                    <p>
                                        <ol>
                                           @foreach ($module_info['obj'] as $mod_obj)
                                               <li>
                                                {{$mod_obj}}
                                               </li>
                                           @endforeach
                                        </ol>
                                    </p>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Method Of Instructions
                                    <p class="subtitle font-size-14 mb-0">This module will be delivered in the following ways: </p>

                                    <p>
                                        <ol>
                                            @foreach ($module['instructions_by'] as $instructions)
                                                <li>{{$instructions}}</li>
                                            @endforeach
                                        </ol>
                                    </p>
                                </h4>
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
                                            @if ($module['video_url'] != "")
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe src="{{$module['video_url']}}" allowfullscreen=""></iframe>
                                              </div>
                                            @endif
                                        
                        
                                          <div class="box-body">
                                           <h5>Content/sub-topics:</h5>
                                            <p>
                                                <ol>
                                                    @foreach ($module['topics'] as $topics)
                                                    <li>{{$topics}}</li>
                                                    @endforeach
                                                </ol>
                                               
                                            </p>
                        
                                           
                        
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
