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

                    <div class="col-lg-6 col-12 mt-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Set Your Goals Now</h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form">
                                <div class="box-body">



                                    <div class="form-group">
                                        <label>How much weight You want to loose(per week)</label>
                                        <input type="text" class="form-control"
                                            placeholder="Enter Weight in KG between 0.1 to 1.5" id="weight_goal_input">
                                        {{-- <label>Left group button</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button"
                                                    class="btn btn-rounded btn-info btn-sm dropdown-toggle"
                                                    data-toggle="dropdown">Action</button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Action</a>
                                                    <a href="#" class="dropdown-item">Another action</a>
                                                    <a href="#" class="dropdown-item">Something else here</a>
                                                    <a href="#" class="dropdown-item">One more line</a>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Left group button">
                                        </div> --}}
                                    </div>



                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">

                                    {{-- <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-cup-alt"></i> Set Your Goal
                                    </button> --}}
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
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
