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
        <form action="{{ url('lions-club/risk-assessment/start') }}" id="wizard" method="POST">
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
                <h3>Let's Get Started</h3>
                {{-- <textarea class="form-control" name="" readonly></textarea> --}}


                <div class="form-row">
                    <div class="form-col">
                        <div class="form-holder">
                            <!-- Full Name Input -->
                            <label for="full_name">Enter Your Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="form-control"
                                placeholder="Your Full Name">
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-holder">
                            <!-- Whatsapp Contact Input -->
                            <label for="whatsapp_contact">Enter Your Whatsapp Contact</label>
                            <input type="text" name="whatsapp_contact" id="whatsapp_contact" class="form-control"
                                placeholder="Your Whatsapp Contact">
                        </div>
                    </div>
                </div>

                <!-- Hidden Fields -->
                <input type="hidden" name="start_qs_1" value="no">
                <input type="hidden" name="start_qs_2" value="no">


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
