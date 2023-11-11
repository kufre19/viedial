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

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            gap: 20px; /* Space between logos and form */
        }
    
        .logo-left, .logo-right {
            width: 30%; /*Adjust the size as needed */
            height: auto; /* Maintain aspect ratio */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .logo-left img, .logo-right img {
            width: 100%;
            height: auto;
        }
    
        .wrapper {
            /* Adjust wrapper styles if necessary */
        }
    
        @media screen and (max-width: 768px) {
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-left, .logo-right {
            display: none; /* Hide both logos */
        }

        #wizard {
            /* width: 100%; */
            /* position: relative; */
            background: url('{{asset("view_assets/lions_asset/lions-logo-2.jpeg")}}') no-repeat center center;
            background-size: cover;
            /* opacity: 0.1; Make the background image faint */
        }

        .form-holder {
            background-color: rgba(255, 255, 255, 0.9);
            position: relative; /* Ensure form content is visible on top of the background */
        }
    }
    </style>
    
    
    
</head>

<body>

    <div class="logo-left">
        <img src="{{asset("view_assets/lions_asset/lions-logo-2.jpeg")}}" alt="Right Logo">

    </div>
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
                                placeholder="Country code format i.e 234....">
                        </div>
                    </div>


                </div>

                {{-- <div class="form-row">
                    
                    <div class="form-col">
                        <div class="form-holder">
                            <label for="country_code">Country Code</label>
                            <select name="country_code" id="country_code" class="form-control">
                                <!-- Country options will be loaded here -->
                            </select>
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
                </div> --}}


                <!-- Hidden Fields -->
                <input type="hidden" name="start_qs_1" value="no">
                <input type="hidden" name="start_qs_2" value="no">


            </section>


        </form>

       
    </div>

    <div class="logo-right">
        <img src="{{asset("view_assets/lions_asset/lions-logo-1.jpeg")}}" alt="Left Logo">

    </div>


    <script src="{{ asset('view_assets/risk_assessment/js/jquery-3.3.1.min.js') }}"></script>

    <!-- JQUERY STEP -->
    <script src="{{ asset('view_assets/risk_assessment/js/jquery.steps.js') }}"></script>

    <!-- DATE-PICKER -->
    <script src="{{ asset('view_assets/risk_assessment/vendor/date-picker/js/datepicker.js') }}"></script>
    <script src="{{ asset('view_assets/risk_assessment/vendor/date-picker/js/datepicker.en.js') }}"></script>

    <script src="{{ asset('view_assets/risk_assessment/js/main.js') }}"></script>
    {{-- <script>
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(countries => {
                const countryCodeSelect = document.getElementById('country_code');
                countries.forEach(country => {
                    if (country.idd && country.idd.root && country.idd.suffixes && country.idd.suffixes.length > 0) {
                        const dialCode = country.idd.root + country.idd.suffixes[0];
                        const option = document.createElement('option');
                        option.value = dialCode;
                        option.textContent = `${country.name.common} (${dialCode})`;
                        countryCodeSelect.appendChild(option);
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching country data:', error);
                // Handle the error appropriately
            });
    </script>
     --}}


</body>

</html>