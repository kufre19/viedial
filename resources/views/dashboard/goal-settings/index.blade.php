@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Set Your Goals</h3>
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
                @if (session()->get('bmi') != false)
                    <div class="row d-flex justify-content-center">
                        <div class="col">

                            <div class="box pull-up">
                                <div class="box-body d-flex p-0">
                                    <div class="flex-grow-1 bg-viedial-theme px-30 pt-50 pb-100 bg-img min-h-350"
                                        style="background-position: right bottom; background-size: 30% auto; background-image: url({{ asset('view_assets/images/bmi-icon.svg') }})">
                                        <h3 class="font-weight-400">Your BMI</h3>

                                        <p class="my-10 font-size-16 font-weight-bold">
                                            Your Current BMI is {{ session()->get('bmi') }}
                                        </p>
                                        @include('dashboard.goal-settings.set-goal-form')

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    @if (session()->get('bmi') > 25)
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-viedial-theme">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            Your Goal !
                                        </h4>
                                    </div>
                                    <div class="card-body">


                                        <div class="box pull-up ">
                                            <div class="box-body ">
                                                <h4 class="box-title">Desired state
                                                    <p class="subtitle font-size-14 mb-0">
                                                        Your healthy weight should be {{ $healthy_weight }} KG

                                                    </p>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="box pull-up ">
                                            <div class="box-body ">
                                                <h4 class="box-title">What we recommend
                                                    <p class="subtitle font-size-14 mb-0">
                                                        We encourage you to lose at least 10% of your current weight to
                                                        reduce
                                                        your cardiovascular
                                                        risk factors as soon as possible. Losing at least 10% of your
                                                        current
                                                        weight will reduce your
                                                        blood pressure, your blood sugar, and your blood cholesterol.
                                                        It will also improve your chances of living longer in good health.

                                                    </p>
                                                    <p class="subtitle font-size-14 mb-0">
                                                        As soon as you achieve this, we encourage you to work hard to
                                                        achieve
                                                        your healthy
                                                        weight to
                                                        further reduce these risk factors and stay healthier for a long
                                                        time.

                                                    </p>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @include('dashboard.goal-settings.recommendation')
                @else
                    @include('dashboard.home-page-banners')
                @endif

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.goal-settings.modals.weight-goal-alert')
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {

            $(window).keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });

            $("#weight_goal_input").on("input", function() {
                var weight = $(this).val();

                if (weight > 1.5) {
                    $(this).val("");
                    $('#modal-weight-goal-error').modal("show");
                } else if (weight < 1 || weight == null) {
                    $(this).val("");
                    return true;
                } else {
                    getGoalSetInfo(weight);
                    $('#modal-weight-goal-notice').modal("show");
                }

            });

            $("#submit-goal-btn").on("click", function() {
                $("#form-set-goals").submit();
            });


            function getGoalSetInfo(weight_goal) {
                var csrfToken = "{{ csrf_token() }}";
                // Make an Ajax request using the extracted 'foodId'
                $.ajax({
                    url: "{{ url('set-your-goals/get-info') }}", // Replace with your actual URL
                    type: 'POST', // Use 'POST' or 'GET' as needed
                    data: {
                        weight_goal: weight_goal,
                        _token: csrfToken
                    }, // Send the 'foodId' as data
                    success: function(response) {
                        // Handle the success response here
                        console.log('Ajax request successful:', response.data);
                        $("span#time-holder_1").text(response.time_for_ten_percent);
                        $("span#time-holder_2").text(response.time_for_healthy_weight);
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur during the Ajax request
                        console.error('Ajax request error:', status, error);
                        return response.data;
                    }
                });
            }


        });
    </script>
@endsection
