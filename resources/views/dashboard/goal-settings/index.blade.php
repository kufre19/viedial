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
                <div class="row d-flex justify-content-center">

                    <div class="col">

                        <div class="box pull-up">
                            <div class="box-body d-flex p-0">
                                <div class="flex-grow-1 bg-viedial-theme px-30 pt-50 pb-100 bg-img min-h-350"
                                    style="background-position: right bottom; background-size: 30% auto; background-image: url({{ asset('view_assets/images/bmi-icon.svg') }})">
                                    <h3 class="font-weight-400">Your BMI</h3>

                                    <p class="my-10 font-size-16 font-weight-bold">
                                        Your Current BMI is 25
                                    </p>
                                    <p class="my-10 font-size-16 font-weight-bold">
                                        Set your weight loss goal
                                    </p>

                                    <form action="" class="form" id="form-set-goals">
                                        <div class="form-group col-lg-4 col-sm-12 ">
                                            <label>How much weight you want to lose per week</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter between 0.1 to 1.5 KG" size="10"
                                                id="weight_goal_input">

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card bg-viedial-theme">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Our Recommedations
                                </h4>
                            </div>
                            <div class="card-body">


                                <div class="box pull-up ">
                                    <div class="box-body ">
                                        <h4 class="box-title">Physical
                                            <p class="subtitle font-size-14 mb-0">
                                                You Should do
                                            </p>
                                        </h4>
                                    </div>
                                </div>

                                <div class="box pull-up ">
                                    <div class="box-body ">
                                        <h4 class="box-title">Diet
                                            <p class="subtitle font-size-14 mb-0">
                                                You Should do
                                            </p>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                  

                </div>
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
        $("#form-set-goals").on("submit", function(event){
            event.preventDefault();
        });
        $("#weight_goal_input").on("change", function() {
            var weight = $(this).val();
            if (weight < 0.1 || weight > 1.5) {
                $('#modal-weight-goal-error').modal("show");
            }else{
                $('#modal-weight-goal-notice').modal("show");
            }
        });

        // $('#modal-weight-goal').modal("show");


    });
</script>
@endsection
