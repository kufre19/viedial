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
                                     @include('dashboard.goal-settings.set-goal-form')

                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                @include('dashboard.goal-settings.recommendation')
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.goal-settings.modals.weight-goal-alert')
    @if (session()->get("bmi") > 25)
        @include('dashboard.goal-settings.modals.goal-setting-warning')
    @endif
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            $("#form-set-goals").on("submit", function(event) {
                event.preventDefault();
            });
            $("#weight_goal_input").on("change", function() {
                var weight = $(this).val();
                if (weight < 0.1 || weight > 1.5) {
                    $('#modal-weight-goal-error').modal("show");
                } else {
                    $('#modal-weight-goal-notice').modal("show");
                }
            });

            // $('#modal-weight-goal').modal("show");


        });
    </script>
@endsection
