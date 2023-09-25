@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">


            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title"> Your Risk Scores</h3>
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
                <div class="row">

                    <div class="col-12">
                        @if (count($result_list) > 0)
                            @foreach ($result_list as $result)
                                <div class="card pull-up">
                                    <div class="card-body">
                                        <h4 class="card-title">Assesment {{ $result['score_for'] }}</h4>
                                        <p class="card-text">
                                            Name: {{ Auth::user()->name }} <br>
                                            Age: {{ $result['age'] }} <br>
                                            Score: {{ $result['risk_score'] }}
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        @else
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
                        @endif


                    </div>






                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
