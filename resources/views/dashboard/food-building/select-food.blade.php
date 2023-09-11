@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Add Food To Shopping List (Vegetables)</h3>
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


                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/amaranth.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Amaranth</h4>

                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/carrot.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Carrot </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/bitter-leaf.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Bitter Leaf </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/cauliflower.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Cauli Flowers </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/cucumber.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Cucumber </h4>

                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/beetroot.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Beet Root </h4>

                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/green-bell-pepper.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Green Bell Pepper </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/greenwhite-cabbage.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Green White Cabbage </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/purple-cabbage.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Purple Cabbage </h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <a href="#">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/red-bell-pepper.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Red Bell Pepper </h4>

                                </div>

                            </div>
                        </a>
                    </div>
                    

                </div>
                <div class="row d-flex justify-content-center mt-5">
                    <a href="#" class="btn btn-primary pull-up">Back To Food Categories</a>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.food-building.modals.select-season')
@endsection