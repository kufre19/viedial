<div class="row">

    @if (session()->get('bmi') > 25)
        @if (session()->get('set-goal') != false)
            <div class="col-12">
                <div class="card bg-viedial-theme">
                    <div class="card-header">
                        <h4 class="card-title">
                            Your Healthy Goal Journey
                        </h4>
                    </div>
                    <div class="card-body">


                        <div class="box pull-up ">
                            <div class="box-body ">
                                <h4 class="box-title">How Long ?
                                    <p class="subtitle font-size-14 mb-0">
                                        It will take you xxxx weeks to lose 10% of your body weight. At this time, you
                                        may start
                                        observing reduced blood pressure, reduced blood sugar and reduced blood
                                        cholesterol levels.

                                    </p>
                                </h4>
                            </div>
                        </div>

                        <div class="box pull-up ">
                            <div class="box-body ">
                                <h4 class="box-title">What You Gain !
                                    <p class="subtitle font-size-14 mb-0">
                                        It will take you xxx weeks to achieve a healthy body weight. At this time, you
                                        may have developed healthy habits that will help you achieve sustained
                                        reduction in your blood pressure, blood sugar and blood cholesterol.

                                    </p>
                                </h4>
                            </div>
                        </div>

                        <p>
                            We will work with you to achieve these goals by combining changes in your diet,
                            physical activity and stress management.
                        </p>


                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="col-12">
            <div class="card bg-viedial-theme">
                <div class="card-header">
                    <h4 class="card-title">
                        Our Recommedations
                    </h4>
                </div>
                <div class="card-body">


                    <div class="box pull-up ">
                        <div class="box-body ">
                            <h4 class="box-title">Physical
                                <p class="subtitle font-size-14 mb-0">
                                    Do moderate exercise for at least 30 minutes every day. Learn more about moderate
                                    exercise from <a href="#">here</a>
                                </p>
                            </h4>
                        </div>
                    </div>

                    <div class="box pull-up ">
                        <div class="box-body ">
                            <h4 class="box-title">Diet
                                <p class="subtitle font-size-14 mb-0">
                                    Eat at least 5 servings of vegetables

                                </p>
                            </h4>
                        </div>
                    </div>

                    <div class="box pull-up ">
                        <div class="box-body ">
                            <h4 class="box-title">Daily Habit
                                <p class="subtitle font-size-14 mb-0">
                                    Sleep for at least 7 to 8 hours a night
                                </p>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif


</div>
