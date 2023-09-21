<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Risk Assessment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="{{ asset('view_assets/risk_assessment/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">

    {{-- DATE PICKER --}}
    <link rel="stylesheet" href="{{ asset('view_assets/risk_assessment/vendor/date-picker/css/datepicker.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('view_assets/risk_assessment/css/style.css') }}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}

</head>

<body>
    <div class="wrapper">


        <form action="{{ url('risk-assessment/type-2-diabetes') }}" id="wizard" method="POST">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <h3>About You</h3>
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
                            <div class="input-group">
                                <input type="number" class="form-control" name="weight" id="weight" placeholder="">
                                <div class="input-group-append">
                                    <select class="form-control" name="weightUnit" id="weightUnit">
                                        <option value="kg" selected>Kilograms (Kg) </option>
                                        <option value="lbs">Pounds (lbs)</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            {{-- <input type="number" name="weight" id="weight" class="form-control"> --}}
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="height_m">
                            What is your height in meters?
                        </label>
                        <div class="form-holder">


                            <i class="zmdi zmdi-baby"></i>
                            <input type="number" name="height_m" id="height_m" class="form-control"
                                placeholder="Height in meters">
                        </div>
                    </div>

                </div>

                <p>OR</p>

                <div class="form-row">
                    <div class="form-col">
                        <label for="height_ft">
                            What is your height in Feets and Inches?
                        </label>
                        <div class="form-holder">

                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            <input type="number" name="height_ft" id="height_ft" class="form-control mb-1"
                                placeholder="Feets">
                            <input type="number" name="height_in" id="height_in" class="form-control"
                                placeholder="Inches">

                        </div>
                    </div>


                </div>


            </section>

            <!-- SECTION 3 -->
            <h4></h4>
            <section>
                <h3> Habit and Health </h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="waste_width">
                            how wide is your waistline at the level of your navel?
                        </label>
                        <div class="form-holder">
                            <div class="input-group">
                                <input type="number" class="form-control" name="waist_width" id="waist_width"
                                    placeholder="">
                                <div class="input-group-append">
                                    <select class="form-control" name="waist_width_unit" id="measureUnit">
                                        <option value="cm" selected>Centimeters (cm) </option>
                                        <option value="inches">Inches (in)</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            {{-- <input type="number" name="waist_width" id="waste_width" class="form-control"> --}}
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

                <div class="form-row">
                    <div class="form-col">
                        <label for="eat_vegie">
                            Do you eat fruits and vegetables everyday?
                        </label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            <select name="eat_vegie" id="eat_vegie" class="form-control">
                                <option value="yes" class="option">Yes</option>
                                <option value="no" class="option">No</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="treatment">
                            are you currently on treatment for high blood pressure?
                        </label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            <select name="treatment" id="treatment" class="form-control">
                                <option value="yes" class="option">Yes</option>
                                <option value="no" class="option">No</option>

                            </select>
                        </div>
                    </div>
                </div>


            </section>

            <!-- SECTION 4 -->
            <h4></h4>
            <section>
                <h3>Final Steps</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="tested_hbp">
                            Have you ever been found to have high blood sugar levels due to pregnancy or any ill-health?
                        </label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            <select name="tested_hbp" id="tested_hbp" class="form-control">
                                <option value="yes" class="option">Yes</option>
                                <option value="no" class="option">No</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="fam_diabetes">
                            Have any of the members of your family ever been diagnosed with diabetes (type 1 or type 2)?
                        </label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            <select name="fam_diabetes" id="fam_diabetes" class="form-control">
                                <option value="yes_1" class="option">Yes: grandparent, aunt, uncle or first cousin
                                    (but no own parent, brother, sister or child) </option>
                                <option value="yes_2" class="option">Yes: parent, brother, sister or own child
                                </option>
                                <option value="no" class="option">No</option>

                            </select>
                        </div>
                    </div>
                </div>
            </section>


        </form>
    </div>

    <script src="{{ asset('view_assets/risk_assessment/js/jquery-3.3.1.min.js') }}"></script>

    <!-- JQUERY STEP -->
    <script src="{{ asset('view_assets/risk_assessment/js/jquery.steps.js') }}"></script>

    <!-- DATE-PICKER -->
    <script src="{{ asset('view_assets/risk_assessment/vendor/date-picker/js/datepicker.js') }}"></script>
    <script src="{{ asset('view_assets/risk_assessment/vendor/date-picker/js/datepicker.en.js') }}"></script>

    <script src="{{ asset('view_assets/risk_assessment/js/main.js') }}"></script>

    

    <!-- Template created and distributed by Colorlib -->
</body>

</html>
