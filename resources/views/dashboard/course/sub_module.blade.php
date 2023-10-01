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
                                <h4 class="card-title"> 
                                    {{ $sub_module['title'] }}
                                    <p class="subtitle font-size-14 mb-0">
                                        {{$sub_title_name}}
                                    </p>

                                </h4>
                                {{-- <p>
                                    {{ Breadcrumbs::render('sub.module', $course_info['course_id'],$module_info['mod_id'],$sub_module['id']) }}
                                </p> --}}
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
                                            @if ($sub_module['video_url'] != '')
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe width="560" height="315" src="{{ $sub_module['video_url'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                </div>
                                            @endif


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
