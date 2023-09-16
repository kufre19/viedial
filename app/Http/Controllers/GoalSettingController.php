<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalSettingController extends Controller
{
    public function home()
    {
        return view("dashboard.goal-settings.index");
    }
}
