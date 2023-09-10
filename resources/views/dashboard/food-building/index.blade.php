@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Food Building</h3>
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
                <div class="col-xl-8">
                    <div class="box no-shadow mb-0 bg-transparent">
                        <div class="box-header no-border px-0">
                            <h4 class="box-title">Your Build History</h4>
                            <div class="box-controls pull-right d-md-flex d-none">
                                <a href="#">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- history card --}}
                        <div class="col-12">
                            <a href="#" class="box pull-up">
                                <div class="box-body">
                                    <h4 class="box-title">Meal Type
                                        <p class="subtitle font-size-14 mb-0">Info on meal like date and time built </p>
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="box pull-up">
                                <div class="box-body">
                                    <h4 class="box-title">Meal Type
                                        <p class="subtitle font-size-14 mb-0">Info on meal like date and time built </p>
                                    </h4>
                                </div>
                            </a>
                        </div>

                    </div>


                    {{-- build btn --}}
                    <div class="row" class=" d-flex justify-content-center">
                        <div class="col">
                            <a href="#" class="btn btn-primary pull-up">Build Food</a>
                        </div>

                    </div>




                </div>


            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    {{-- @include('layouts.dashboard.modals.goal-settings.modal') --}}
@endsection
