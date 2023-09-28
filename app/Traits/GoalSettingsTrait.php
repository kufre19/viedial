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

}