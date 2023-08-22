@extends('layouts.reg_and_login.app')

@section('extra_csss')
    <style>
        #cvd {
            transition: opacity 0.5s;
            /* Transition effect that lasts 0.5 seconds */
            display: none;
            /* By default, both are not visible */
            opacity: 0;
            /* Set initial opacity to 0 */
        }

        #cvd.visible,
        {
        display: block;
        /* Make div visible in the document flow */
        opacity: 1;
        /* Set full opacity */
        }

        #diabetes.visible,
        {
        display: block;
        /* Make div visible in the document flow */
        opacity: 1;
        /* Set full opacity */
        }
    </style>
@endsection

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="bg-white rounded30 shadow-lg visible" id="diabetes" style="display: block">
                    <div class="content-top-agile p-20 pb-0">
                        <h2 class="text-primary">Assessment Result</h2>
                    </div>
                    <div class="p-40">
                        <div class="box-shadowed">
                            {{-- @if (isset($risk_score_percentage))
                                <div class="box-title  d-flex justify-content-center align-items-center">
                                    <h4 class="box-title"></h4>
                                    <div class="text-center">
                                        
                                        <div style="display:inline;width:180px;height:180px;">
                                            <canvas width="180" height="180"></canvas>
                                            <input class="knob" data-width="180" data-height="180" data-linecap="round" data-fgcolor="{{$chart_color}}" value="{{$risk_score_percentage}}" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" 
                                            style="width: 94px; height: 60px; position: absolute;  border: 0px; background: none; font: bold 36px Arial; text-align: center; color: rgb(114, 27, 0); padding: 0px; appearance: none;">
                                        </div>
                                    </div>
                                </div>
                                @endif --}}

                            <div class="box-body">
                                <b>Risk Score: {{ $risk_score ?? $risk_score_diabete }}</b>

                                <hr class="mb-2">
                                {{ $risk_implication }}
                                <hr class="mb-2">
                                <b>Recommendation:</b>
                                {{ $risk_recommendation }}
                                <hr class="mb-2">
                                <a href="{{ $recommendation_link }}" class="btn btn-primary">Get Our Recommendation</a>
                                <hr class="mb-2">
                                @if (isset($second_result))
                                    <a href="#" class="btn btn-viedial" id="hide-diabetes">See Next Result</a>
                                @endif

                            </div>

                        </div>
                        <div class="text-center">

                        </div>
                    </div>
                </div>

                @if (isset($second_result))
                    <div class="bg-white rounded30 shadow-lg" id="cvd" style="display: none">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary">Assessment Result</h2>
                        </div>
                        <div class="p-40">
                            <div class="box-shadowed">
                                {{-- @if (isset($risk_score_percentage))
                                <div class="box-title  d-flex justify-content-center align-items-center">
                                    <h4 class="box-title"></h4>
                                    <div class="text-center">
                                        
                                        <div style="display:inline;width:180px;height:180px;">
                                            <canvas width="180" height="180"></canvas>
                                            <input class="knob" data-width="180" data-height="180" data-linecap="round" data-fgcolor="{{$chart_color}}" value="{{$risk_score_percentage}}" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".1" readonly="readonly" 
                                            style="width: 94px; height: 60px; position: absolute;  border: 0px; background: none; font: bold 36px Arial; text-align: center; color: rgb(114, 27, 0); padding: 0px; appearance: none;">
                                        </div>
                                    </div>
                                </div>
                                @endif --}}


                                <div class="box-body">
                                    <b>Risk Score: {{ $risk_score_cvd }}</b>
                                    <br>
                                    @if (isset($risk_score_percentage_cvd))
                                        <b>Risk Score Percentage: {{ $risk_score_percentage_cvd }}%</b>
                                    @endif


                                    <hr class="mb-2">
                                    {{ $risk_implication_cvd }}
                                    <hr class="mb-2">
                                    <b>Recommendation:</b>
                                    {{ $risk_recommendation_cvd }}
                                    <hr class="mb-2">
                                    <a href="{{ $recommendation_link_cvd }}" class="btn btn-primary">Get Our
                                        Recommendation</a>
                                    <hr class="mb-2">
                                    @if (isset($second_result))
                                        <a href="#" class="btn btn-viedial" id="hide-cvd">See Next Result</a>
                                    @endif
                                </div>

                            </div>
                            <div class="text-center">

                            </div>
                        </div>
                    </div>
                @endif

            </div>



        </div>
    </div>
@endsection


@section('extra_js')
    <script>
        $(document).ready(function() {
            $('#hide-diabetes').on('click', function() {
                const div1 = $('#diabetes');
                const div2 = $('#cvd');

                if (div1.hasClass('visible')) {
                    div1.removeClass('visible').fadeOut(500, function() {
                        div2.fadeIn(500).addClass('visible');
                    });
                } else {
                    div2.removeClass('visible').fadeOut(500, function() {
                        div1.fadeIn(500).addClass('visible');
                    });
                }
            });

            $('#hide-cvd').on('click', function() {
                const div1 = $('#diabetes');
                const div2 = $('#cvd');

                if (div1.hasClass('visible')) {
                    div1.removeClass('visible').fadeOut(500, function() {
                        div2.fadeIn(500).addClass('visible');
                    });
                } else {
                    div2.removeClass('visible').fadeOut(500, function() {
                        div1.fadeIn(500).addClass('visible');
                    });
                }
            });
        });
    </script>
@endsection
