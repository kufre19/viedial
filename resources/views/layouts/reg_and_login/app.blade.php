<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>@yield('title', 'Viedial')</title>

    @include('layouts.dashboard.style')
    @yield('extra_css')
</head>


<body class="hold-transition theme-primary bg-img"
    style="background-image: linear-gradient(to right, #800020, #c24262);">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            @yield('main-content')
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('view_assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('view_assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('view_assets/assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('view_assets/assets/vendor_components/jquery-knob/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('view_assets/js/pages/widget-inline-charts.js') }}"></script>


    @yield('extra_js')



</body>

</html>
