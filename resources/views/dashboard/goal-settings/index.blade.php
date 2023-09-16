@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Set Your Goals</h3>
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
                <div class="row d-flex justify-content-center">
                 
                    <div class="col-lg-7">
                      
                        <div class="box pull-up">
                            <div class="box-body d-flex p-0">
                                <div class="flex-grow-1 bg-viedial-theme px-30 pt-50 pb-100 flex-grow-1 bg-img min-h-350"
                                    style="background-position: right bottom; background-size: 40% auto; background-image: url({{ asset('view_assets/images/bmi-icon.svg') }})">
                                    <h3 class="font-weight-400">Your BMI</h3>

                                    <p class="my-10 font-size-16 font-weight-bold">
                                        Your Current BMI is 25
                                    </p>
                                    <p class=" font-size-16 ">
                                        At Current Weight of 78 KG
                                    </p>

                                    {{-- <a href="#" class="btn btn-info-light">Join Now</a> --}}
                                </div>
                            </div>
                        </div>

                    </div>

                    
                </div>

                <div class="row">

                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
@endsection
