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
                                    <b>More Content</b>
                                    </p>
                                </h4>
                            </div>
                        </div>
                    </div>





                    @if (isset($module['extra_videos']) && $module['extra_videos'] != '')
                        @foreach ($module['extra_videos'] as $extra_video)
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"> Extra Module Video
                                        </h4>
                                    </div>

                                    <div class="card-body align-item-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="box">

                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe width="560" height="315" src="{{ $extra_video }}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                    </div>



                                                </div>

                                            </div>


                                        </div>

                                    </div>


                                </div>
                            </div>
                        @endforeach
                    @endif








                </div>


            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
