<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Risk Assessment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="{{ asset('view_assets/risk_assessment/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="{{ asset('view_assets/risk_assessment/vendor/date-picker/css/datepicker.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('view_assets/risk_assessment/css/style.css') }}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}

</head>

<body>
    <div class="wrapper">
        <form action="{{ url('risk-assessment/cvd') }}" id="wizard" method="POST">
            @csrf
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <h3>Risk Assessment For RISK OF CVD</h3>
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
                <h3>Treatment History</h3>
                {{-- <textarea class="form-control" name="" readonly></textarea> --}}


                <div class="form-row">
                    <div class="form-col">

                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-account-o"></i> --}}
                            <label for="treating_cvd">
                                are you currently on treatment for high blood pressure?
                            </label>

                            <select name="treating_cvd" id="treating_cvd" class="form-control">
                                <option value="yes" class="option">Yes</option>
                                <option value="no" class="option">No</option>

                            </select>
                            <i class="zmdi zmdi-chevron-down"></i>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="systolic_pressure">
                            what was your systolic blood pressure in mmHg the last time you checked your blood pressure?
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-baby"></i>
                            <input type="number" name="systolic_pressure" id="systolic_pressure" class="form-control">
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
                        <label for="smoking">
                            Do you currently smoke?
                        </label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            <select name="smoking" id="smoking" class="form-control">
                                <option value="yes" class="option">Yes</option>
                                <option value="no" class="option">No</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="fam_cvd">
                            Do you have any member of your family (grand parents, father, mother, sibling or cousin) has
                            had a stroke or a heart attack or kidney failure?
                        </label>
                        <div class="form-holder">
                            {{-- <i class="zmdi zmdi-baby"></i> --}}
                            <select name="fam_cvd" id="fam_cvd" class="form-control">
                               
                                <option value="yes" class="option">
                                    Yes
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
