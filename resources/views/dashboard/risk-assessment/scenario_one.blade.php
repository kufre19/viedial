<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Risk Assessment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('view_assets/risk_assessment/fonts/material-design-iconic-font/css/material-design-iconic-font.css')}}">

		<!-- DATE-PICKER -->
		<link rel="stylesheet" href="{{asset('view_assets/risk_assessment/vendor/date-picker/css/datepicker.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('view_assets/risk_assessment/css/style.css')}}">
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}

	</head>
	<body>
		<div class="wrapper">
            <form action="{{url('risk-assessment/type-2-diabetes')}}" id="wizard" method="POST">
                @csrf
        		<!-- SECTION 1 -->
                <h4></h4>
                <section>
                    <h3>Risk Assessment For RISK OF ONLY DEVELOPING TYPE 2 DIABETES</h3>
                    {{-- <textarea class="form-control" name="" readonly></textarea> --}}

                	
                    <div class="form-row">
                        <div class="form-col">
                            
                            <div class="form-holder">
                                {{-- <i class="zmdi zmdi-account-o"></i> --}}
                                <p>Are you living with hypertension?</p>
                                <select name="" id="" class="form-control">
                                    <option value="united states" class="option">Yes</option>
                                    <option value="united kingdom" class="option">No</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            
                            <div class="form-holder">
                                {{-- <i class="zmdi zmdi-account-o"></i> --}}
                                <p>Are you living with Type 2 diabetes?</p>
                                <select name="" id="" class="form-control">
                                    <option value="united states" class="option">Yes</option>
                                    <option value="united kingdom" class="option">No</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    
                </section>

           
                <!-- SECTION 2 -->
                <h4></h4>
                <section>
                	<h3>Residential address</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Country
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <select name="" id="" class="form-control">
                                    <option value="united states" class="option">United States</option>
                                    <option value="united kingdom" class="option">United Kingdom</option>
                                    <option value="viet nam" class="option">Viet Nam</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Street Address
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin"></i>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Apartment
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-home"></i>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Town / City
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin-drop"></i>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                County
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin"></i>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Postcode / Zip
                            </label>
                            <div class="form-holder password">
                                <i class="zmdi zmdi-eye"></i>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </section>
              
			
            </form>
		</div>

		<script src="{{asset('view_assets/risk_assessment/js/jquery-3.3.1.min.js')}}"></script>
		
		<!-- JQUERY STEP -->
		<script src="{{asset('view_assets/risk_assessment/js/jquery.steps.js')}}"></script>

		<!-- DATE-PICKER -->
		<script src="{{asset('view_assets/risk_assessment/vendor/date-picker/js/datepicker.js')}}"></script>
		<script src="{{asset('view_assets/risk_assessment/vendor/date-picker/js/datepicker.en.js')}}"></script>

		<script src="{{asset('view_assets/risk_assessment/js/main.js')}}"></script>

<!-- Template created and distributed by Colorlib -->
</body>
</html>