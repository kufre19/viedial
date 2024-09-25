@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Shopping List</h3>
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
                                {{-- <div class="box-controls pull-right d-md-flex d-none">
                                    <a href="{{ url('build-food/history') }}">View all</a>
                                </div> --}}
                            </div>
                        </div>

                        <div class="row">
                            {{-- history card --}}
                            @if (count($shopping_list) > 0)
                                @foreach ($shopping_list as $list)
                                    <div class="col-12">
                                        <a href="{{route('continue-building',['shopping_list_id'=>$list->id])}}" class="box pull-up">
                                            <div class="box-body">
                                                <h4 class="box-title">{{ $list->name }}
                                                    <p class="subtitle font-size-14 mb-0">
                                                        Created: {{ $list->created_at->diffForHumans() }} <br>
                                                        {{-- Calories: {{$meal->calories}} <br> --}}

                                                    </p>
                                                </h4>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 d-flex justify-content-center">
                                    <p>You have no shopping list history, 😃 you can get started by clicking the Build
                                        button below.
                                    </p>
                                </div>
                            @endif

                        </div>


                        {{-- build btn --}}
                        <div class="row" class=" d-flex justify-content-center">
                            <div class="col">
                                @if (count($shopping_list) > 0)
                                    {{ $shopping_list->links() }}
                                @else
                                    <a href="{{ url('build-food') }}" class="btn btn-viedial pull-up" data-toggle="modal"
                                        data-target="#modal-select-season-notification">Start Building Food</a>
                                @endif

                            </div>

                        </div>

                    </div>


                </div>



            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
@endsection
