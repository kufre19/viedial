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
                                <label for="gender">
                                    You identify as
                                </label>
                            
                                <select name="gender" id="gender" class="form-control">
                                    <option value="male" class="option">Male</option>
                                    <option value="female" class="option">Female</option>
                                    <option value="other" class="option">Other</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="age">
                                how old are you in years only?
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-baby"></i>
                                <input type="number" name="age" id="age" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                </section>

           
                <!-- SECTION 2 -->
                <h4></h4>
                <section>
                	<h3>Let's Get Your BMI</h3>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="weight">
                                What is your weight in kg or pounds?
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-baby"></i>
                                <input type="number" name="weight" id="weight" class="form-control">
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="height">
                                What is your height in cm or meters?
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-baby"></i>
                                <input type="number" name="height" id="height" class="form-control">
                            </div>
                        </div>
                    </div>
                </section>

                  <!-- SECTION 3 -->
                  <h4></h4>
                  <section>
                      <h3>Final Step</h3>
                      <div class="form-row">
                          <div class="form-col">
                              <label for="waste_width">
                                how wide is your waistline at the level of your navel?   
                              </label>
                              <div class="form-holder">
                                  <i class="zmdi zmdi-baby"></i>
                                  <input type="number" name="waste_width" id="waste_width" class="form-control">
                              </div>
                          </div>
                          <div class="form-col">
                              <label for="exercise">
                                Do you exercise or move around for at least 30 minutes everyday?
                              </label>
                              <div class="form-holder">
                                  {{-- <i class="zmdi zmdi-baby"></i> --}}
                                  <select name="exercise" id="exercise" class="form-control">
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