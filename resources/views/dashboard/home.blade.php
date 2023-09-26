@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row fx-element-overlay">
                    @include('dashboard.home-page-banners')

                    <div class="col-12">
                        <div class="box no-shadow mb-0 bg-transparent">
                            <div class="box-header no-border px-0">
                                <h4 class="box-title">Subscribed Courses</h4>
                                <ul class="box-controls pull-right d-md-flex d-none">

                                </ul>
                            </div>
                        </div>
                    </div>

                    @foreach ($subscriptions as $subscription)
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="box">
                                <div class="fx-card-item">
                                    <div class="fx-card-avatar fx-overlay-1"> <img
                                            src={{ config("courses.$subscription->course_id.image") }} alt="user"
                                            class="bbrr-0 bblr-0">
                                        <div class="fx-overlay">
                                            <ul class="fx-info">
                                                <li><a class="btn btn-danger no-border"
                                                        href="{{ url('courses/' . $subscription->course_id) }}">
                                                        View More</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="fx-card-content">
                                        <h4 class="box-title mb-0">
                                            {{ config("courses.$subscription->course_id.title") }}</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach




                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
