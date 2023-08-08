﻿@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="box pull-up">
                            <div class="box-body bg-img" style="background-image: url({{asset('view_assets/images/bg-5.png')}});"
                                data-overlay-light="9">
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-md-flex align-items-center mb-30 mb-lg-0 w-p100">
                                        <img src="{{asset('view_assets/images/svg-icon/color-svg/custom-14.svg')}}" class="img-fluid max-w-150"
                                            alt="" />
                                        <div class="ml-30">
                                            <h4 class="mb-10">Take Our Advance Risk Assesment Test !</h4>
                                            <p class="mb-0 text-fade">Check if you are at risk of having a heart attack, stroke, kidney failure etc. </p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="waves-effect waves-light btn-block btn btn-dark"
                                            style="white-space: nowrap;">Start Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-12">
                        <div class="box no-shadow mb-0 bg-transparent">
                            <div class="box-header no-border px-0">
                                <h4 class="box-title">Cours Classes</h4>
                                <ul class="box-controls pull-right d-md-flex d-none">
                                    <li>
                                        <button class="btn btn-primary-light px-10">View All</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @foreach ($subscriptions as $subscription)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="box pull-up">
                                <div class="box-body d-flex align-items-center">
                                    <img src="../images/front-end-img/courses/cor-logo-6.png" alt=""
                                        class="align-self-end h-80 w-80">
                                    <div class="d-flex flex-column flex-grow-1">
                                        <h5 class="box-title font-size-16 mb-2">Hypertention Education</h5>
                                        <a href="#">Learn</a>
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
