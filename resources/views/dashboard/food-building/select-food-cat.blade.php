@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Build Meal (Tropical)</h3>
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
                <div class="row d-flex justify-content-center text-center fx-element-overlay">


                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ url('build-food/start/select-food/tropical/vegetables') }}">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food-cats/food-cat-vegetables.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Vegetables</h4>

                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ url('build-food/start/tropical') }}">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food-cats/food-cat-fruits.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Fruits </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ url('build-food/start/tropical') }}">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food-cats/food-cat-legumes.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Legumes </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ url('build-food/start/tropical') }}">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food-cats/food-cat-grains-tubers.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Grains </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="row d-flex justify-content-center mt-5">
                    <a href="#" class="btn btn-primary pull-up">Continue Building</a>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.food-building.modals.select-season')
@endsection
