<?php

namespace App\Http\Controllers;

use App\Models\GoalSettings;
use App\Traits\GoalSettingsTrait;
use App\Traits\RiskAssessment;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GoalSettingController extends Controller
{
    use UserTrait, RiskAssessment, GoalSettingsTrait;
    public function home()
    {
        if (session()->get("bmi") != false) {
            $health_data = $this->getHealthData();
            $healthy_weight = $this->userHealthyWeight($health_data->height);

            if (session()->get("set-goal")) {
                $goalSetData = $this->getGoalSetted();
                return view("dashboard.goal-settings.index", compact("healthy_weight", "goalSetData"));
            } else {

                return view("dashboard.goal-settings.index", compact("healthy_weight"));
            }
            $health_data = $this->getHealthData();
            $healthy_weight = $this->userHealthyWeight($health_data->height);
            return view("dashboard.goal-settings.index", compact("healthy_weight"));
        }
        return view("dashboard.goal-settings.index");
    }

    public function set_goal_form()
    {
        return view("dashboard.goal-settings.set-goal-form");
    }

    public function saveGoal(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "weight_goal" => 'numeric|required|min:1|max:1.5'
        ]);
        if ($validate->fails()) {
            return redirect()->back();
        }

        $weight_goal = $request->input("weight_goal");

        $health_data = $this->getHealthData();
        $starting_weight = $health_data->weight;
        $height = $health_data->height;
        $healthy_weight = $this->userHealthyWeight($height);

        $time_for_goal = $this->getGoalTime($starting_weight, $weight_goal, $healthy_weight);

        $goal_setting_model = new GoalSettings();
        $goal_setting_model->user_id = Auth::user()->id;
        $goal_setting_model->weight_loss_goal = $weight_goal;
        $goal_setting_model->ideal_weight =  $healthy_weight;
        $goal_setting_model->time_for_ten_percent_weight = $time_for_goal["time_for_ten_percent"];
        $goal_setting_model->time_for_healthy_weight = $time_for_goal["time_for_healthy_weight"];
        $goal_setting_model->starting_weight = $starting_weight;

        $goal_setting_model->save();
        $this->userHasGoalSet();
        return redirect()->back();
    }

    public function getSetGoalInfo(Request $request)
    {
        $health_data = $this->getHealthData();
        $starting_weight = $health_data->weight;
        $height = $health_data->height;
        $healthy_weight = $this->userHealthyWeight($height);


        $time_for_goal = $this->getGoalTime($starting_weight, $request->input("weight_goal"), $healthy_weight);
        return response()->json(
            [
                "time_for_ten_percent" => $time_for_goal["time_for_ten_percent"],
                "time_for_healthy_weight" => $time_for_goal["time_for_healthy_weight"]
            ]
        );
    }

    
}
