@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="bg-white rounded30 shadow-lg">
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
                                <b>Risk Score: {{ $risk_score }}</b>
                                <br>
                                @if (isset($risk_score_percentage))
                                    <b>Risk Score Percentage: {{ $risk_score_percentage }}%</b>
                                @endif


                                <hr class="mb-2">
                                {{ $risk_implication }}
                                <hr class="mb-2">
                                <b>Recommendation:</b>
                                {{ $risk_recommendation }}
                                <hr class="mb-2">
                                <a href="{{ $recommendation_link }}" class="btn btn-primary">Get Our Recommendation</a>
                            </div>

                        </div>
                        <div class="text-center">

                        </div>
                    </div>
                </div>




            </div>



        </div>
    </div>
@endsection
