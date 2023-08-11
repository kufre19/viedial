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
                                <h4 class="card-title"> {{ $module_info['title'] }}

                                    <p class="subtitle font-size-14 mb-0">
                                        <b>Learning objectives:</b> At the end of this module, you will be able to
                                    </p>

                                    <p>
                                    <ol>
                                        @foreach ($module_info['obj'] as $mod_obj)
                                            <li>
                                                {{ $mod_obj }}
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
                                    <p class="subtitle font-size-14 mb-0">This module will be delivered in the following
                                        ways: </p>

                                    <p>
                                    <ol>
                                        @foreach ($module['instructions_by'] as $instructions)
                                            <li>{{ $instructions }}</li>
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
                                    <p class="subtitle font-size-14 mb-0">This module will be delivered in the following
                                        ways: </p>

                                    <p>
                                    <ol>
                                        @foreach ($module['instructions_by'] as $instructions)
                                            <li>{{ $instructions }}</li>
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
                                            @if ($module['video_url'] != '')
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe src="{{ $module['video_url'] }}" allowfullscreen=""></iframe>
                                                </div>
                                            @endif


                                            <div class="box-body">
                                                <h5>Content/sub-topics:</h5>
                                                <p>
                                                <ol>
                                                    @foreach ($module['topics'] as $topics)
                                                        <li>{{ $topics }}</li>
                                                    @endforeach
                                                </ol>

                                                </p>



                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>


                        </div>
                    </div>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Module Worksheets

                                </h4>
                            </div>

                            <div class="card-body">
                                <div class="box box-slided-up">

                                    <div class="box-header with-border">
                                        <h3 class="box-title"> Worksheets </h3>

                                        <ul class="box-controls pull-right">
                                            <li><a class="box-btn-slide" href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="box-body">
                                        <div class="media-list media-list-divided">
                                            @foreach ($pdfs as $pdf)
                                              

                                                    <div class="media media-single px-0">
                                                        <div
                                                            class="ml-0 mr-15 bg-success-light h-50 w-50 l-h-50 rounded text-center">
                                                            <span class="font-size-24 text-success"><i
                                                                    class="fa fa-file-pdf-o"></i></span>
                                                        </div>
                                                        <span class="title font-weight-500 font-size-16">{{ basename($pdf) }}</span>
                                                        <a class="font-size-18 text-gray hover-info" href="{{ route('download.worksheet', ['module'=>$module_info['mod_id'],'file' => basename($pdf)]) }}"><i></i></a>
                                                    </div>
        
                                            @endforeach
                                            
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
