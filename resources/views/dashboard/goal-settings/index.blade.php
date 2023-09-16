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

                                    <a href="#" class="btn btn-info-light">Set Your Goals</a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card bg-viedial-theme">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Our Recommedations
                                </h4>
                            </div>
                            <div class="card-body">


                                <div class="box pull-up ">
                                    <div class="box-body ">
                                        <h4 class="box-title">Physical
                                            <p class="subtitle font-size-14 mb-0">
                                                You Should do
                                            </p>
                                        </h4>
                                    </div>
                                </div>

                                <div class="box pull-up ">
                                  <div class="box-body ">
                                      <h4 class="box-title">Diet
                                          <p class="subtitle font-size-14 mb-0">
                                              You Should do
                                          </p>
                                      </h4>
                                  </div>
                              </div>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                      <a href="#" class="btn btn-viedial">Set Your Goals</a>

                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
@endsection
