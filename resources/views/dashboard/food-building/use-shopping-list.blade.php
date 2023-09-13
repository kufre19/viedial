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
                <div class="row d-flex justify-content-center text-center fx-element-overlay">


                    <div class="col-lg-3 col-md-6 col-12">
                       
                            <div class="card pull-up">
                                <img class="card-img-top"
                                    src="{{ asset('view_assets/images/food/vegetables/amaranth.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Amaranth</h4>
                                    <p>
                                        Cabs: 10 <br>
                                        Protein: 20 <br>
                                        Calories: 60 cal <br>
                                    </p>
                                    
                                </div>

                                <div class="card-footer">
                                   
                                    <div width="70">
                                        <label for="serving-number">Number of Serving</label>
                                        <input type="number" class="form-control"  placeholder="1" min="0" max="5">
                                    </div>
										

                                </div>

                            </div>
                     
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                       
                        <div class="card pull-up">
                            <img class="card-img-top"
                                src="{{ asset('view_assets/images/food/vegetables/cauliflower.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Cauli Flower</h4>
                                <p>
                                    Cabs: 10 <br>
                                    Protein: 20 <br>
                                    Calories: 60 cal <br>
                                </p>

                            </div>

                            <div class="card-footer">
                                
                                <div width="70">
                                    <label for="serving-number">Number of Serving </label>
                                    <input type="number" class="form-control"  placeholder="1" min="0" max="5">
                                </div>
                                    

                            </div>

                        </div>
                 
                </div>
                   
              




                </div>
                <div class="row  mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{ url('build-food/use-shopping-list') }}"
                        class="btn btn-viedial pull-up">Complete Build</a>
                    </div>
                    
                   
                
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.food-building.modals.save-shopping-list')
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            // Add a click event handler to elements with the class 'add-food-to-cart'
            $('.remove-food-from-cart').on('click', function(event) {
                // Prevent the default behavior of the anchor tag
                event.preventDefault();

                // Get the value of the 'data-food-id' attribute
                var foodId = $(this).data('food-id');
                var csrfToken = "{{csrf_token()}}";

                // Make an Ajax request using the extracted 'foodId'
                $.ajax({
                    url: "{{url('build-food/food-cart/remove')}}", // Replace with your actual URL
                    type: 'POST', // Use 'POST' or 'GET' as needed
                    data: {
                        foodId: foodId,
                        _token: csrfToken
                    }, // Send the 'foodId' as data
                    success: function(response) {
                        // Handle the success response here
                        console.log('Ajax request successful:', response.data);
                        $.toast({
                        heading: 'Food Cart',
                        text: response.data,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'warning',
                        hideAfter: 3500,
                        stack: 6
                    });
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
