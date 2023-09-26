@if (session()->get('bmi') > 25 )
    <p class="my-10 font-size-16 font-weight-bold">
        Set your weight loss goal
    </p>

    <form action="" class="form" id="form-set-goals">
        <div class="form-group col-lg-4 col-sm-12 ">
            <label>How much weight you want to lose per week</label>
            <input type="text" class="form-control" placeholder="Enter between 0.1 to 1.5 KG" size="10"
                id="weight_goal_input">

        </div>

    </form>
@else
    <p class="my-10 font-size-16 font-weight-bold"> Awesome You're currently at moderate
        BMI let's help you maintain this</p>
@endif
