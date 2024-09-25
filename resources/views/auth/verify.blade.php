

@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded30 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <img src="{{ asset('view_assets/images/logos/Logo File - Main-02.png') }}" width="20%"
                            height="20%" alt="">
                        <h2 class="text-viedial">Please Verify Your Email</h2>
                        <p class="mb-0">An email has been sent to {{Auth::user()->email}}, Please use it to verify your account before proceeding</p>
                    </div>
                    <div class="p-40">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn  btn-viedial ">{{ __('click here to request another') }}</button>.
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
