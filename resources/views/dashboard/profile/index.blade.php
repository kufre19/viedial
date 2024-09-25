@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Profile Settings</h3>
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
                <div class="row ">
                    <div class="col-lg-6 col-12 mt-5">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Change Password</h4>
                            </div>
                            <!-- /.box-header -->
                            <form action="{{ route('profile.change-password') }}" class="form" id="monitoring"
                                method="POST">
                                @csrf
                                <div class="box-body">

                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="text" class="form-control" id="old_password"
                                            placeholder="Enter Your old password" name="old_password">

                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter Your new password" name="password">

                                    </div>

                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            placeholder="Enter Your old password" name="password_confirmation">

                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">

                                    <button type="submit" class="btn btn-rounded btn-viedial">
                                        Change Password
                                    </button>

                                </div>

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
@endsection

@section('extra_js')
    <script>

        @if (session('success'))
            swal("", "{{ session('success') }}", 'success');
        @elseif (session('error'))
            swal("", "{{ session('error') }}", 'error');
        @endif
    </script>
@endsection
