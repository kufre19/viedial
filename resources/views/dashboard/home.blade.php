@extends('layouts.dashboard.app')


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
                                            <h4 class="mb-10">Take Advance Courses to Achive Your Goal !</h4>
                                            <p class="mb-0 text-fade">It is a long established fact that a reader will be
                                                distracted <br>of a page when looking at its layout. </p>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="waves-effect waves-light btn-block btn btn-dark"
                                            style="white-space: nowrap;">Start Now!</button>
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
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box pull-up">
                            <div class="box-body d-flex align-items-center">
                                <img src="../images/front-end-img/courses/cor-logo-6.png" alt=""
                                    class="align-self-end h-80 w-80">
                                <div class="d-flex flex-column flex-grow-1">
                                    <h5 class="box-title font-size-16 mb-2">Angular Class</h5>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box pull-up">
                            <div class="box-body d-flex align-items-center">
                                <img src="../images/front-end-img/courses/cor-logo-5.png" alt=""
                                    class="align-self-end h-80 w-80">
                                <div class="d-flex flex-column flex-grow-1">
                                    <h5 class="box-title font-size-16 mb-2">Android Class</h5>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box pull-up">
                            <div class="box-body d-flex align-items-center">
                                <img src="../images/front-end-img/courses/cor-logo-4.png" alt=""
                                    class="align-self-end h-80 w-80">
                                <div class="d-flex flex-column flex-grow-1">
                                    <h5 class="box-title font-size-16 mb-2">Python Class</h5>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box pull-up">
                            <div class="box-body d-flex align-items-center">
                                <img src="../images/front-end-img/courses/cor-logo-3.png" alt=""
                                    class="align-self-end h-80 w-80">
                                <div class="d-flex flex-column flex-grow-1">
                                    <h5 class="box-title font-size-16 mb-2">laravel </h5>
                                    <a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row fx-element-overlay">
                    <div class="col-12">
                        <div class="box no-shadow mb-0 bg-transparent">
                            <div class="box-header no-border px-0">
                                <h4 class="box-title">My Courses</h4>
                                <ul class="box-controls pull-right d-md-flex d-none">
                                    <li>
                                        <button class="btn btn-primary-light px-10">View All</button>
                                    </li>
                                    <li class="dropdown">
                                        <button class="dropdown-toggle btn btn-primary-light px-10" data-toggle="dropdown"
                                            href="#" aria-expanded="false">Most Popular</button>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item active" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last week</a>
                                            <a class="dropdown-item" href="#">Last month</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1"> <img src="../images/front-end-img/courses/4.jpg"
                                        alt="user" class="bbrr-0 bblr-0">
                                    <div class="fx-overlay">
                                        <ul class="fx-info">
                                            <li><a class="btn btn-danger no-border" href="javascript:void(0);">View
                                                    More</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content">
                                    <h4 class="box-title mb-0">Manegement</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1"> <img src="../images/front-end-img/courses/9.jpg"
                                        alt="user" class="bbrr-0 bblr-0">
                                    <div class="fx-overlay">
                                        <ul class="fx-info">
                                            <li><a class="btn btn-danger no-border" href="javascript:void(0);">View
                                                    More</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content">
                                    <h4 class="box-title mb-0">Networking</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1"> <img src="../images/front-end-img/courses/8.jpg"
                                        alt="user" class="bbrr-0 bblr-0">
                                    <div class="fx-overlay">
                                        <ul class="fx-info">
                                            <li><a class="btn btn-danger no-border" href="javascript:void(0);">View
                                                    More</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content">
                                    <h4 class="box-title mb-0">Security</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1"> <img src="../images/front-end-img/courses/2.jpg"
                                        alt="user" class="bbrr-0 bblr-0">
                                    <div class="fx-overlay">
                                        <ul class="fx-info">
                                            <li><a class="btn btn-danger no-border" href="javascript:void(0);">View
                                                    More</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content">
                                    <h4 class="box-title mb-0">Language</h4>
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
