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
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <div class="box no-shadow mb-0 bg-transparent">
                            <div class="box-header no-border px-0">
                                <h4 class="box-title">Your Build History</h4>
                                <div class="box-controls pull-right d-md-flex d-none">
                                    <a href="{{ url('build-food/history') }}">View all</a>
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
                                                <h4 class="box-title">{{ $meal->name }}
                                                    <p class="subtitle font-size-14 mb-0">
                                                        Built: {{ $meal->updated_at->diffForHumans() }} <br>
                                                        {{-- Calories: {{$meal->calories}} <br> --}}
                                                        Meal Type: {{ $meal->meal_type }}<br>
                                                        Calories: {{number_format($meal->meal_calories,2) }}
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
                                <a href="#" class="btn btn-viedial pull-up" data-toggle="modal"
                                    data-target="#modal-select-season-notification">Start Building Food</a>
                            </div>
                            @if ($continue_building != false)
                                <div class="col">
                                    <a href="{{ route('continue-building', ['last_meal_built_id'=>$continue_building['last_meal_built_id'],'shopping_list_id' => $continue_building['last_shopping_list_id']]) }}"
                                        class="btn btn-primary pull-up">
                                        Continue Build Food
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>

                    @if (session()->get('set-goal') != false)
                        <div class="col-lg-6 col-12 mt-3">
                            <div class="card bg-viedial-theme">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Your Calories Requirement
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="box pull-up ">
                                        <div class="box-body ">
                                            <h4 class="box-title">Calories to eat
                                                <p class=" text-bold mb-0">
                                                    {{ $calories_requirment['calories_eat'] }} Calories

                                                </p>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="box pull-up ">
                                        <div class="box-body ">
                                            <h4 class="box-title">Calorie to burn through exercise

                                                <p class="text-bold mb-0">
                                                    {{ $calories_requirment['calores_exercise'] }} Calories


                                                </p>
                                            </h4>

                                        </div>
                                    </div>
                                    <div class="box pull-up ">
                                        <div class="box-body ">
                                            <h4 class="box-title">Required amount of protein

                                                <p class="text-bold mb-0">
                                                    {{ $calories_requirment['reqs_protein_oil']['amount_of_protein'] }} grams


                                                </p>
                                            </h4>

                                        </div>
                                    </div>
                                    {{-- <div class="box pull-up ">
                                        <div class="box-body ">
                                            <h4 class="box-title">Required amount of fat

                                                <p class="text-bold mb-0">
                                                    {{ $calories_requirment['reqs_protein_oil']['amount_of_fat'] }} grams


                                                </p>
                                            </h4>

                                        </div>
                                    </div> --}}
                                    <div class="box pull-up ">
                                        <div class="box-body ">
                                            <h4 class="box-title">Recommended table spoons of olive oil for meals per day
                                                <p class="text-bold mb-0">
                                                    {{ $calories_requirment['reqs_protein_oil']['recomm_spoon_of_olive_oil'] }} Spoons


                                                </p>
                                            </h4>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif


                </div>



            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.food-building.modals.select-season')
    @include('dashboard.food-building.modals.shopping-cart-saved')
    @include('dashboard.food-building.modals.meal-built')
@endsection
