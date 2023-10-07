@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Enter Servings</h3>
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
                <div class="row d-flex justify-content-right text-right">
                    <div class="col">
                        <h3 class="text-viedial text-bold">
                            This meal contains <span id="meal_calories_counter">{{session()->get('buildFoodSession')['meal_calories']}}</span> calories
                        </h3>
                    </div>
                </div>
                <div class="row d-flex justify-content-center text-center fx-element-overlay">

                    @foreach ($shopping_list_items as $item)
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food'). "/". $item->image }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{$item->name}}</h4>
                                    <p>
                                        Cabs: {{$item->carbs}} <br>
                                        Calories: <span id="food_calories_counter_{{$item->id}}"> {{session()->get('buildFoodSession')['servings'][$item->id]*$item->calories}}</span>  <br>
                                    </p>

                                </div>

                                <div class="card-footer">

                                    <div width="70">
                                        <label for="serving-number">Number of Serving</label>
                                        <input type="text" class="form-control food-serving-number" placeholder="1" min="0"
                                            max="5" data-food-id="{{$item->id}}" data-food-name="{{$item->name}}" >
                                    </div>


                                </div>

                            </div>

                        </div>
                    @endforeach




                </div>
                <div class="row  mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="#" class="btn btn-viedial pull-up" data-toggle="modal"
                            data-target="#modal-complete-build">Complete Build</a>
                    </div>



                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    {{-- @include('dashboard.food-building.modals.save-shopping-list') --}}
    @include('dashboard.food-building.modals.complete-build')
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {

            // update meal type and show complete btn
            $('#meal_type_select').on("change", function(event){
                var mealType = $(this).val();
                var csrfToken = "{{ csrf_token() }}";

                $.ajax({
                    url: "{{ route('use-shopping-list.enter-meal-type') }}", 
                    type: 'POST',
                    data: {
                        mealType: mealType,
                        _token: csrfToken
                    }, // Send the 'foodId' as data
                    success: function(response) {
                        // Handle the success response here
                        console.log('Ajax request successful:', response.data);
                        $("#complete-build").show();

                        
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur during the Ajax request
                        console.error('Ajax request error:', status, error);
                        $.toast({
                            heading: 'Food Cart',
                            text: response.data,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            stack: 6
                        });
                    }
                });
            });


        // write script to check for decimal entry in serving number
            $('.food-serving-number').on("change", function(event){
                var num_of_serving = $(this).val();
                var food_id = $(this).data('food-id');
                var food_name = $(this).data('food-name');
                var csrfToken = "{{ csrf_token() }}";

                $.ajax({
                    url: "{{ route('use-shopping-list.enter-serving-number') }}", 
                    type: 'POST',
                    data: {
                        num_of_serving: num_of_serving,
                        food_id:food_id,
                        food_name:food_name,
                        _token: csrfToken
                    }, // Send the 'foodId' as data
                    success: function(response) {
                        // Handle the success response here
                        $.toast({
                            heading: 'Shopping List',
                            text: response.data,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                        $("#meal_calories_counter").text(response.meal_calories);
                        var counter_span = "#food_calories_counter_" +response.food_item_id;
                        console.log(counter_span);
                        $(counter_span).text(response.food_item_calories);
                        
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur during the Ajax request
                        console.error('Ajax request error:', status, error);
                        $.toast({
                            heading: 'Food Cart',
                            text: response.data,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            stack: 6
                        });
                    }
                });
            });

        });
    </script>
@endsection
