@if (session()->get('bmi') > 25)
    @if (session()->get('set-goal') == false)
        <p class="my-10 font-size-16 font-weight-bold">
            Set your weight loss goal
        </p>

        <form action="{{url('set-your-goals/save')}}" method="POST" class="form" id="form-set-goals">
            @csrf
            <div class="form-group col-lg-4 col-sm-12 ">
                <div class="row">
                    <div class="col-12">
                        <label>How much weight do you want to lose per week</label>
                        <input type="text" class="form-control" name="weight_goal" placeholder="Enter between 0.1 to 1.5 KG" size="10"
                            id="weight_goal_input">
                    </div>
                    <div class="col-12 mt-2">
                        <button type="button" id="check-goal" class="btn btn-primary ">Set</button>
                    </div>
                </div>
                

            </div>

        </form>
    @else
        <p class="my-10 font-size-16 font-weight-bold">
            Your health goal has been set
        </p>

        <p class="my-10 font-size-16 font-weight-bold">
            Weight loss goal per week for you is: {{$goalSetData->weight_loss_goal}} KG
        </p>

    @endif
@else
    <p class="my-10 font-size-16 font-weight-bold"> Awesome You're currently at moderate
        BMI let's help you maintain this</p>
@endif
