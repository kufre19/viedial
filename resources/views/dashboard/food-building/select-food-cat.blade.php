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


                   
                    @foreach ($food_categories as $food_category)
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('list.food-items',['food_cat'=>$food_category->id])  }}">
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food-cats/') ."/". $food_category->image }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{$food_category->name}}</h4>

                                </div>

                            </div>
                        </a>
                    </div>

                    @endforeach
                


                </div>
                <div class="row d-flex justify-content-center mt-5">
                    <a href="{{url('build-food/shopping-list/view')}}" class="btn btn-primary pull-up">Continue Building</a>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    {{-- @include('dashboard.food-building.modals.select-season') --}}
@endsection
