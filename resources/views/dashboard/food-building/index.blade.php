@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Happy And Healthy Eating</h3>
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
                                <a href="{{url('build-food/history')}}">View all</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- history card --}}
                        @if (count($meals) > 0)
                            @foreach ($meals as $meal)
                                <div class="col-12">
                                    <a href="#" class="box pull-up">
                                        <div class="box-body">
                                            <h4 class="box-title">{{$meal->name}}
                                                <p class="subtitle font-size-14 mb-0">
                                                    Date: {{$meal->created_at->diffForHumans}} <br>
                                                    Calories: {{$meal->calories}} <br>
                                                    Meal Type: {{$meal->meal_type}}
                                                </p>
                                            </h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 d-flex justify-content-center">
                                <p>You have no build history, 😃 you can get started by clicking the Build button below.
                                </p>
                            </div>
                        @endif





                    </div>


                    {{-- build btn --}}
                    <div class="row" class=" d-flex justify-content-center">
                        <div class="col">
                            <a href="#" class="btn btn-primary pull-up" data-toggle="modal"
                                data-target="#modal-select-season-notification">Build Food</a>
                        </div>

                    </div>

                </div>


            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.food-building.modals.select-season')
    @include('dashboard.food-building.modals.shopping-cart-saved')

@endsection


