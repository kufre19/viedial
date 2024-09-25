@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded30 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <img src="{{asset('view_assets/images/logos/Logo File - Main-02.png')}}" width="20%" height="20%" alt="">
                        <h2 class="text-viedial">Reset Password</h2>
                        {{-- <p class="mb-0">Send a request to reset your password</p> --}}
                    </div>
                    <div class="p-40">
                        <form method="POST" action="{{  route('password.update') }}">
                            @csrf
                            
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    </div>
                                    <input  id="email"  type="email" name="email" class="form-control pl-15 bg-transparent @error('email') is-invalid @enderror" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                                        <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" name="password" class="form-control pl-15 bg-transparent @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password"  class="form-control pl-15 bg-transparent" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                           
                            <div class="row">
                              
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-viedial mt-10">Reset Password</button>
                                </div>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection