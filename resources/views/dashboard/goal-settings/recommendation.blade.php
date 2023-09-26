<div class="row">

    @if (session()->get('bmi') > 25)
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
                                    You Should do
                                </p>
                            </h4>
                        </div>
                    </div>

                    <div class="box pull-up ">
                        <div class="box-body ">
                            <h4 class="box-title">Diet
                                <p class="subtitle font-size-14 mb-0">
                                    You Should do
                                </p>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
                                    Do moderate exercise for at least 30 minutes every day. Learn more about moderate exercise from <a href="#">here</a>
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
