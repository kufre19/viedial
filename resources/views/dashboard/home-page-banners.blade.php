@if (session()->get('bmi') != false)
    <div class="col-lg-8 col-12">
        <div class="box pull-up">
            <div class="box-body bg-img" style="background-image: url({{ asset('view_assets/images/bg-5.png') }});"
                data-overlay-light="9">
                <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-md-flex align-items-center mb-30 mb-lg-0 w-p100">
                        <img src="{{ asset('view_assets/images/bmi-icon.svg') }}"
                            class="img-fluid max-w-150" alt="" />
                        <div class="ml-30">
                            <h4 class="mb-10">Next set your health goals!</h4>
                            <p class="mb-0 text-fade">set your weight loss goal to gain better health! </p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ url('set-your-goals') }}"
                            class="waves-effect waves-light btn-block btn btn-dark" style="white-space: nowrap;">Set Goal
                            Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-lg-8 col-12">
        <div class="box pull-up">
            <div class="box-body bg-img" style="background-image: url({{ asset('view_assets/images/bg-5.png') }});"
                data-overlay-light="9">
                <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-md-flex align-items-center mb-30 mb-lg-0 w-p100">
                        <img src="{{ asset('view_assets/images/svg-icon/color-svg/risk-assessment.svg') }}"
                            class="img-fluid max-w-150" alt="" />
                        <div class="ml-30">
                            <h4 class="mb-10">First take our advance risk assesment!</h4>
                            <p class="mb-0 text-fade">Check if you are at risk of having a heart attack,
                                stroke, kidney failure etc. </p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('risk.assessment.start') }}"
                            class="waves-effect waves-light btn-block btn btn-dark" style="white-space: nowrap;">Start
                            Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
