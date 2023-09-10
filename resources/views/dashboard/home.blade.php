﻿@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row fx-element-overlay">
                    <div class="col-lg-8 col-12">
                        <div class="box pull-up">
                            <div class="box-body bg-img"
                                style="background-image: url({{ asset('view_assets/images/bg-5.png') }});"
                                data-overlay-light="9">
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-md-flex align-items-center mb-30 mb-lg-0 w-p100">
                                        <img src="{{ asset('view_assets/images/svg-icon/color-svg/custom-14.svg') }}"
                                            class="img-fluid max-w-150" alt="" />
                                        <div class="ml-30">
                                            <h4 class="mb-10">Take Our Advance Risk Assesment Test !</h4>
                                            <p class="mb-0 text-fade">Check if you are at risk of having a heart attack,
                                                stroke, kidney failure etc. </p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('risk.assessment.start') }}"
                                            class="waves-effect waves-light btn-block btn btn-dark"
                                            style="white-space: nowrap;">Start Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
