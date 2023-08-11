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
                                <h4 class="card-title">Content/sub-topics:
                                    <p class="subtitle font-size-14 mb-0">This module will be delivered in the following
                                        ways: </p>

                                    <p>
                                        <ol>
                                            @foreach ($module['topics'] as $topics)
                                            <a href="{{ route('load.sub.module',['course_id'=>$course_info['course_id'],'mod_id'=>$module_info['mod_id'],'sub_mod_id'=>$topics['id']]) }}">
                                                <li>{{ $topics['title'] }}</li>
                                            </a>
                                            @endforeach
                                        </ol>
                                    </p>


                                  
                                </h4>
                            </div>
                        </div>
                    </div>






                </div>


            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
