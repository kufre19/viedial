@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded30 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <h2 class="text-primary">Get started with Us</h2>
                        <p class="mb-0">Register a new membership</p>
                    </div>
                    <div class="p-40">
                        <form action="https://eduadmin-template.multipurposethemes.com/bs4/main/index.html" method="post">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control pl-15 bg-transparent" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" class="form-control pl-15 bg-transparent" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control pl-15 bg-transparent" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control pl-15 bg-transparent"
                                        placeholder="Retype Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="checkbox">
                                        <input type="checkbox" id="basic_checkbox_1">
                                        <label for="basic_checkbox_1">I agree to the <a href="#"
                                                class="text-warning"><b>Terms</b></a></label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info margin-top-10">SIGN IN</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="mt-15 mb-0">Already have an account?<a href="auth_login.html"
                                    class="text-danger ml-5"> Sign In</a></p>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection
