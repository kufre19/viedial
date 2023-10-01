<?php

namespace App\Traits;

use App\Models\GoalSettings;
use Illuminate\Support\Facades\Auth;

trait GoalSettingsTrait{

    public function getGoalSetted()
    {
        $goal_set = GoalSettings::where("user_id", Auth::user()->id)->latest()->first();
        return $goal_set;

    }

    public function getGoalTime($starting_weight, $target_weight, $healthy_weight)
    {
        $ten_percent_loss = 0.1 * $starting_weight;

        $time_for_ten_percent = $ten_percent_loss / $target_weight;
        $time_for_healthy_weight = ($starting_weight - $healthy_weight) / $target_weight;


        $time_for_healthy_weight  = round($time_for_healthy_weight);
        $time_for_ten_percent  = round($time_for_ten_percent);


        return ["time_for_ten_percent" => $time_for_ten_percent, "time_for_healthy_weight" => $time_for_healthy_weight];
    }

}