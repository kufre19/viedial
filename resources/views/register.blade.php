@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded30 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <img src="{{asset('view_assets/images/logos/Logo File - Main-02.png')}}" width="20%" height="20%" alt="">
                        <h2 class="text-viedial">Get started with Us</h2>
                        <p class="mb-0">Register a new membership</p>
                    </div>
                    <div class="p-40">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control pl-15 bg-transparent @error('name') is-invalid @enderror" placeholder="Full Name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control pl-15 bg-transparent @error('email') is-invalid @enderror" placeholder="Email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control pl-15 bg-transparent @error('password') is-invalid @enderror" placeholder="Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control pl-15 bg-transparent" placeholder="Retype Password" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="checkbox">
                                        <input type="checkbox" name="terms" id="basic_checkbox_1" required>
                                        <label for="basic_checkbox_1">I agree to the <a href="https://viedial.com/privacy-policy-2/" class="text-warning"><b>Terms of use and Privacy Policy</b></a></label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-viedial margin-top-10">SIGN UP</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="mt-15 mb-0">Already have an account?<a href="{{ route('login') }}" class="text-danger ml-5"> Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection