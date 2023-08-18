@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded30 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <h2 class="text-primary">Assessment Result</h2>

                    </div>
                    <div class="p-40">
                       <div class="box-shadowed">

                        <div class="box-body">
                            <b>Risk Score: {{$risk_score}}</b>
                            
                            <hr class="mb-2">
                            {{$risk_implication}}
                            <hr class="mb-2">
                            <b>Recommendation:</b>
                           {{$risk_recommendation}} 
                            <hr class="mb-2">
                                <a href="{{url($recommendation_link)}}" class="btn btn-primary" >Get Recommendation</a>
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
