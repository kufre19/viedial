@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Welcome, {{ Auth::user()->name }}</h3>
                        {{-- <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">e-Commerce</li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                </ol>
                            </nav>
                        </div> --}}
                    </div>

                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row fx-element-overlay">
                    @include('dashboard.home-page-banners')

                </div>

                {{-- risk score div --}}
                @if (session()->get('bmi') != false)
                    {{-- risk score div --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="box no-shadow mb-0 bg-transparent">
                                <div class="box-header no-border px-0">
                                    <h4 class="box-title">Heart Scores</h4>
                                    <ul class="box-controls pull-right d-md-flex d-none">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-sm-12">
                            <div class="box box-bordered border-viedial pull-up">
                                <div class="box-header with-border">
                                    <h4 class="box-title"><strong>Your score for test type</strong> </h4>
                                </div>
                                <div class="box-body ml-5">
                                    <h4>Age: {{$health_data_from_assement->age}}</h4>
                                    <h4>Score: </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                @if (session()->get('set-goal') != false)
                    {{-- set goal div --}}
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <div class="box no-shadow mb-0 bg-transparent">
                                <div class="box-header no-border px-0">
                                    <h4 class="box-title">Your Goals</h4>
                                    <ul class="box-controls pull-right d-md-flex d-none">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4 col-lg-4">
                            <div class="box bg-gradient-viedial pull-up">
                                <div class="box-header">
                                    <h4 class="box-title text-white">Started With</h4>

                                </div>
                                <div class="box-body">
                                    <div class="px-10 py-30 bg-white text-dark">
                                        <h5 class="px-10 mb-15 font-weight-700">BMI</h5>
                                        <div class=" d-flex justify-content-center">

                                            <h2 class="mb-0 text-bold">{{$bmi_from_assessment}}</h2>

                                        </div>
                                    </div>
                                    <div class="px-10 py-30 my-20 bg-white text-dark">
                                        <h5 class="px-10 mb-15 font-weight-700">Weight</h5>
                                        <div class=" d-flex justify-content-center">

                                            <h2 class="mb-0 text-bold">{{$health_data_from_assement->weight}} KG</h2>

                                        </div>
                                    </div>

                                    <div class="px-10 py-30 bg-white text-dark">
                                        <h5 class="px-10 mb-15 font-weight-700">Healthy Weight/Ideal Weight</h5>
                                        <div class=" d-flex justify-content-center">
                                            <h2 class="mb-0 text-bold">{{$user_healthy_weight}} KG</h2>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-xl-4 col-lg-4">
                            <div class="box bg-gradient-viedial pull-up">
                                <div class="box-header">
                                    <h4 class="box-title text-white">Your Goal</h4>

                                </div>
                                <div class="box-body">
                                    <div class="px-10 py-30 bg-white text-dark">
                                        <h5 class="px-10 mb-15 font-weight-700">Weight To Lose Per Week</h5>
                                        <div class=" d-flex justify-content-center">

                                            <h2 class="mb-0 text-bold">{{$user_set_goal->weight_loss_goal}} KG</h2>

                                        </div>
                                    </div>
                                    <div class="px-10 py-30 my-20 bg-white text-dark">
                                        <h5 class="px-10 mb-15 font-weight-700">Time To Loss 10% Of Weight</h5>
                                        <div class=" d-flex justify-content-center">

                                            <h2 class="mb-0 text-bold">{{$user_set_goal->time_for_ten_percent_weight}} Weeks</h2>

                                        </div>
                                    </div>
                                    <div class="px-10 py-30 bg-white text-dark">
                                        <h5 class="px-10 mb-15 font-weight-700">Time To Acheive Healthy Weight</h5>
                                        <div class=" d-flex justify-content-center">

                                            <h2 class="mb-0 text-bold">{{$user_set_goal->time_for_healthy_weight}} Weeks</h2>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @if (session()->get('started-tele-monitoring'))
                            <div class="col-12 col-xl-4 col-lg-4">
                                <div class="box bg-gradient-viedial pull-up">
                                    <div class="box-header">
                                        <h4 class="box-title text-white">Currently At</h4>

                                    </div>
                                    <div class="box-body">
                                        <div class="px-10 py-30 bg-white text-dark">
                                            <h5 class="px-10 mb-15 font-weight-700">BMI</h5>
                                            <div class=" d-flex justify-content-center">

                                                <h2 class="mb-0 text-bold">24</h2>

                                            </div>
                                        </div>
                                        <div class="px-10 py-30 my-20 bg-white text-dark">
                                            <h5 class="px-10 mb-15 font-weight-700">Weight</h5>
                                            <div class=" d-flex justify-content-center">

                                                <h2 class="mb-0 text-bold">82.2 KG</h2>

                                            </div>
                                        </div>

                                        <div class="px-10 py-30 bg-white text-dark">
                                            <h5 class="px-10 mb-15 font-weight-700">Healthy Weight/Ideal Weight</h5>
                                            <div class=" d-flex justify-content-center">

                                                <h2 class="mb-0 text-bold">77.6 KG</h2>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endif





                    </div>
                @endif

                {{-- course div --}}
                <div class="row fx-element-overlay">
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


@section('extra_js')
    <script></script>
@endsection
