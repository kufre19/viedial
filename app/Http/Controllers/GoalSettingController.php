<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalSettingController extends Controller
{
    public function home()
    {
        $ideal_weight = 85;
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

        
    }

    public function getInfo(Request $request)
    {
        return response()->json(["data"=>10]);
    }
}
