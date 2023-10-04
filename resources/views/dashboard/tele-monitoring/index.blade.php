@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title"> Track Your Progress</h3>
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
                <div class="row ">
                    <div class="col-lg-6 col-12 mt-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Enter systolic blood pressure readings</h4>
                            </div>
                            <!-- /.box-header -->
                            <form action="{{ route('tele-monitoring.save') }}" class="form" id="monitoring"
                                method="POST">
                                @csrf
                                <div class="box-body">

                                    <div class="form-group">
                                        <label>What's Your Systolic Blood Pressure</label>
                                        <input type="text" class="form-control" id="bp_systolic" placeholder="Enter Your Systolic Blood Pressure In mmgh"
                                            name="bp_systolic">

                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">


                                </div>

                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-lg-6 col-12 mt-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Enter diastolic blood pressure readings</h4>
                            </div>
                            <!-- /.box-header -->
                            
                                <div class="box-body">

                                    <div class="form-group">
                                        <label>What's Your Diastolic Blood Pressure</label>
                                        <input type="text" id="bp_diastolic" class="form-control" placeholder="Enter Your Diastolic Blood Pressure In mmgh"
                                            name="bp_diastolic">

                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">


                                </div>

                        </div>
                        <!-- /.box -->
                    </div>

                </div>

                <div class="row ">
                    <div class="col-lg-4 col-12 mt-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Blood sugar level</h4>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label>What's your blood sugar level (fasting)</label>
                                   
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-rounded btn-viedial btn-sm dropdown-toggle bsl-unit-selector"
                                                data-toggle="dropdown">mmol/l</button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">mmol/l </a>
                                                <a href="#" class="dropdown-item">mg/dl</a>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="sugar_level_bf" id="sugar_level_bf"
                                            placeholder="Blood sugar level before breakfast">
                                        <input type="hidden" name="unit_bsl_bf" id="unit_bsl_bf" class="bsl_unit" value="mmol/l">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-lg-4 col-12 mt-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Blood sugar level</h4>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label>What's your blood sugar level 2 hours after meal</label>
                                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-rounded btn-viedial btn-sm dropdown-toggle bsl-unit-selector"
                                                data-toggle="dropdown">mmol/l</button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">mmol/l </a>
                                                <a href="#" class="dropdown-item">mg/dl</a>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="sugar_level_afm"
                                            placeholder="Blood sugar level 2 hours after meal" id="sugar_level_afm">

                                        <input type="hidden" name="unit_bsl_afm" id="unit_bsl_afm" class="bsl_unit" value="mmol/l ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-lg-4 col-12 mt-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Blood sugar level</h4>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label>What's your blood sugar level (random test)</label>
                                   
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-rounded btn-viedial btn-sm dropdown-toggle bsl-unit-selector"
                                                data-toggle="dropdown">mmol/l</button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">mmol/l </a>
                                                <a href="#" class="dropdown-item">mg/dl</a>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="sugar_level_random"
                                            placeholder="Blood sugar level before you sleep" id="sugar_level_random">
                                        <input type="hidden" name="unit_bsl_random" id="unit_bsl_random" class="bsl_unit" value="mmol/l ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>



                {{-- submit button row --}}
                <div class="row">
                    <div class="col">
                        <button type="button" id="submit-numbers" class="btn btn-rounded btn-viedial">
                            Save <i class="fa fa-arrow-right"></i>
                        </button>

                        <button type="button" id="loading-button" style="display: none"
                            class="btn btn-rounded btn-viedial">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                    </div>
                    </form>
                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.tele-monitoring.modals.numbers-entered')
    @include('dashboard.tele-monitoring.modals.entry-notification')

@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {


            // Handle dropdown item click event for all dropdowns with class 'dropdown-item'
            $('.dropdown-item').click(function() {
                // Get the selected value from the dropdown item
                var selectedValue = $(this).text();

                // Find the parent input group of the clicked dropdown
                var inputGroup = $(this).closest('.input-group');

                // Set the selected value to the text input inside this input group
                inputGroup.find('.bsl-unit-selector').text(selectedValue);
              
               

                // Set the selected value to the hidden input inside this input group by class
                inputGroup.find('.bsl_unit').val(selectedValue);
            });


            $("#bp_systolic").on("change", function(){
                var field_name = $(this).attr("name");
                var value = $(this).val();
                getInputNotification(field_name,value);
                
            });

            $("#bp_diastolic").on("change", function(){
                var field_name = $(this).attr("name");
                var value = $(this).val();
                getInputNotification(field_name,value);
                
            });

            $("#sugar_level_bf").on("change", function(){
                var field_name = $(this).attr("name");
                var value = $(this).val();
                var unit = $("#unit_bsl_bf").val();

                getInputNotification(field_name,value,unit);
                
            });

            $("#sugar_level_afm").on("change", function(){
                var field_name = $(this).attr("name");
                var value = $(this).val();
                var unit = $("#unit_bsl_afm").val();

                getInputNotification(field_name,value,unit);
                
            });

            $("#sugar_level_random").on("change", function(){
                var field_name = $(this).attr("name");
                var value = $(this).val();
                var unit = $("#unit_bsl_random").val();

                getInputNotification(field_name,value,unit);
                
            });
           

            function getInputNotification(field_name,value,unit="")
            {
                var csrfToken = "{{ csrf_token() }}";
                // Make an Ajax request using the extracted 'foodId'
                $.ajax({
                    url: "{{ url('tele-monitoring/get-input-notification') }}", // Replace with your actual URL
                    type: 'POST', // Use 'POST' or 'GET' as needed
                    data: {
                        fieldName: field_name,
                        value: value,
                        unit: unit,
                        _token: csrfToken
                    }, // Send the 'foodId' as data
                    success: function(response) {
                        // Handle the success response here
                        var message = response.message;
                        if(message != ""){
                            console.log('Ajax request successful:', );
                            $("#notification-message").text(message);
                            $("#modal-input-notification").modal("show");
                        }else{
                            return true;
                        }
                       
                       
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur during the Ajax request
                        console.error('Ajax request error:', status, error);
                        return response.data;
                    }
                });
            }





            // submit the form 
            $("#submit-numbers").on("click", function(event) {

                $("#submit-numbers").hide();
                $("#loading-button").show();

                setTimeout(() => {

                    $("#monitoring").submit();

                }, 3000);

                // $("#modal-numbers-entered").show();
            });




        });
    </script>
@endsection
