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
            <form action="{{url('risk-assessment/start')}}" id="wizard" method="POST">
                @csrf
        		<!-- SECTION 1 -->
                <h4></h4>
                <section>
                    <h3>Let's Get Started</h3>
                    {{-- <textarea class="form-control" name="" readonly></textarea> --}}

                	
                    <div class="form-row">
                        <div class="form-col">
                            
                            <div class="form-holder">
                                {{-- <i class="zmdi zmdi-account-o"></i> --}}
                                <label for="qs_1">Are you living with hypertension?</label>
                                <select name="start_qs_1" id="" class="form-control">
                                    <option value="yes" class="option">Yes</option>
                                    <option value="no" class="option">No</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-col">
                            
                            <div class="form-holder">
                                {{-- <i class="zmdi zmdi-account-o"></i> --}}
                                <label for="qs_2">Are you living with diabetes?</label>
                                <select name="start_qs_2" id="qs_2" class="form-control">
                                    <option value="yes" class="option">Yes</option>
                                    <option value="no" class="option">No</option>
                                </select>
                                
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