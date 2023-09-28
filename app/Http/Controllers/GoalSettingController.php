<?php

namespace App\Http\Controllers;

use App\Models\GoalSettings;
use App\Traits\RiskAssessment;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GoalSettingController extends Controller
{
    use UserTrait, RiskAssessment;
    public function home()
    {
        if (session()->get("set-goal")) {
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
        $heigt = 176;
        $current_weight = 85;
        $ideal_weight = 24.9 * ($heigt / 100) * ($heigt / 100);
        $time_for_goal = $this->getGoalTime($current_weight, $weight_goal, $ideal_weight);


        $goal_setting_model = new GoalSettings();
        $goal_setting_model->user_id = Auth::user()->id;
        $goal_setting_model->weight_loss_goal = $weight_goal;
        $goal_setting_model->ideal_weight =  $ideal_weight;
        $goal_setting_model->time_for_ten_percent_weight = $time_for_goal[1];
        $goal_setting_model->time_for_healthy_weight = $time_for_goal[0];
        $goal_setting_model->starting_weight = $current_weight;

        $goal_setting_model->save();
        return redirect()->back();
    }

    public function getInfo(Request $request)
    {
        $current_weight = 85;
        $heigt = 176;
        $ideal_weight = 24.9 * ($heigt / 100) * ($heigt / 100);
        $time_for_goal = $this->getGoalTime($current_weight, $request->input("weight_goal"), $ideal_weight);
        return response()->json(
            [
                "time_for_ten_percent" => $time_for_goal[0],
                "time_for_healthy_weight" => $time_for_goal[1]
            ]
        );
    }

    public function getGoalTime($current_weight, $target_weight, $ideal_weight)
    {
        $ten_percent_loss = 0.1 * $current_weight;
        $time_for_ten_percent = $ten_percent_loss / $target_weight;
        $time_for_healthy_weight = ($current_weight - $ideal_weight) / $target_weight;

        $time_for_healthy_weight  = ceil($time_for_healthy_weight);
        $time_for_ten_percent  = ceil($time_for_ten_percent);


        return [$time_for_ten_percent, $time_for_healthy_weight];
    }
}
