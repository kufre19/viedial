@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title"> Tele-Monitoring</h3>
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
                                <h4 class="box-title">Enter Your Numbers</h4>
                            </div>
                            <!-- /.box-header -->
                            <form action="{{route('tele-monitoring.save')}}" class="form" id="monitoring" method="POST">
                                @csrf
                                <div class="box-body">

                                    <div class="form-group">
                                        <label>What's Your Blood Pressure</label>
                                        <input type="text" class="form-control"
                                            placeholder="Enter Your Blood Pressure" name="bp">
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>What's Your Current Weight</label>
                                        <input type="text" class="form-control"
                                            placeholder="Enter Your Current Weight" name="weight">
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>What's Your Blood Sugar Level</label>
                                        <input type="text" class="form-control"
                                            placeholder="Enter Your Blood Sugar Level" name="blood_sugar_level">
                                       
                                    </div>



                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">

                                    <button type="button" id="submit-numbers" class="btn btn-rounded btn-viedial">
                                        Save <i class="fa fa-arrow-right"></i>
                                    </button>

                                    <button type="button" id="loading-button" style="display: none" class="btn btn-rounded btn-viedial">
                                        <span class="spinner-grow spinner-grow-sm"  role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
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
@include('dashboard.tele-monitoring.modals.numbers-entered')
@endsection

@section('extra_js')
<script>
    $(document).ready(function() {
        $("#submit-numbers").on("click", function(event) {

            $("#submit-numbers").hide();
            $("#loading-button").show();

            setTimeout(() => {

                $("#monitoring").submit();
                
            }, 3000);

            // $("#modal-numbers-entered").show();
            
            
        });

     


    });
</script>
@endsection