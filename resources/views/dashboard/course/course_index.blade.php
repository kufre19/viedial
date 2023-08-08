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
                                <h4 class="card-title">{{ $course_info['title'] }}
                                    <p class="subtitle font-size-14 mb-0">
                                        From this course, you will learn:
                                    </p>
                                    <ul class="subtitle font-size-14 mb-0">
                                        @foreach ($course_info['obj'] as $obj)
                                            <li>{{ $obj }}</li>
                                        @endforeach
                                    </ul>

                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Course Modules
                                </h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    @foreach ($module_info as $module)
                                        <div class="col-12 shadow-sm mb-2">
                                            <h4 class=" b-0 px-0">{{ $module['title'] }}</h4>
                                            <p>
                                                <b>Learning objectives:</b> At the end of this module, you will be able to
                                            </p>

                                            <p>
                                                <ol>
                                                   @foreach ($module['obj'] as $mod_obj)
                                                       <li>
                                                        {{$mod_obj}}
                                                       </li>
                                                   @endforeach
                                                </ol>
                                            </p>

                                            <p>
                                                <a href="{{ url('course/module/') }}" class="btn btn-primary">Learn More</a>
                                            </p>
                                        </div>
                                    @endforeach

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
