@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">
                        @foreach ($result_list as $result)
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Assesment {{ $result['score_for'] }}</h4>
                                    <p class="card-text">
                                        Name: {{ Auth::user()->name }} <br>
                                        Age: {{ $result['age'] }} <br>
                                        Score: {{ $result['risk_score'] }}
                                    </p>

                                </div>
                            </div>
                        @endforeach

                    </div>






                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
