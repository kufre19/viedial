<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalSettingController extends Controller
{
    public function home()
    {
        return view("dashboard.goal-settings.index");
    }

    public function set_goal_form()
    {
        return view("dashboard.goal-settings.set-goal-form");
    }

    public function saveGoal(Request $request)
    {

        
    }
}
