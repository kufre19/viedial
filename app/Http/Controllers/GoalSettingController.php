<?php

namespace App\Http\Controllers;

use App\Models\GoalSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalSettingController extends Controller
{
    public function home()
    {
        $urrent_weight = 85;
        $heigt = 176;
        $ideal_weight = 24.9 * ($heigt/100) * ($heigt/100);
        $ideal_weight = number_format($ideal_weight,2);

        return view("dashboard.goal-settings.index",compact("ideal_weight"));
    }

    public function set_goal_form()
    {
        return view("dashboard.goal-settings.set-goal-form");
    }

    public function saveGoal(Request $request)
    {
        $weight_goal = $request->input("weight_goal");
        if($weight_goal > 1.5 || $weight_goal < 1)
        {
            return redirect()->back();
        }

        $goal_setting_model = new GoalSettings();
        $goal_setting_model->user_id = Auth::user()->id;
        $goal_setting_model->weight_loss_goal = $weight_goal;

        return redirect()->back();
    }

    public function getInfo(Request $request)
    {
        $current_weight = 85;
        $heigt = 176;
        $ideal_weight = 24.9 * ($heigt/100) * ($heigt/100);
        $time_for_goal = $this->getGoalTime($current_weight,$request->input("weight_goal"),$ideal_weight);
        return response()->json(
            [
                "time_for_ten_percent"=>$time_for_goal[0],
                "time_for_healthy_weight"=>$time_for_goal[1]
            ]);
    }

    public function getGoalTime($current_weight,$target_weight,$ideal_weight)
    {
        $ten_percent_loss = 0.1 * $current_weight;
        $time_for_ten_percent = $ten_percent_loss / $target_weight;
        $time_for_healthy_weight = ($current_weight - $ideal_weight) / $target_weight;

        $time_for_healthy_weight  = ceil($time_for_healthy_weight);
        $time_for_ten_percent  = ceil($time_for_ten_percent);


        return [$time_for_ten_percent, $time_for_healthy_weight];
    }
}
