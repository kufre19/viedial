<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait  UserTrait {

    public function getUserBmi()
    {

        $user = Auth::user()->id;
        session()->put("bmi",27);
        
    }

    public function getGoalSet()
    {
        session()->put("goal-set",true);   
    }

}