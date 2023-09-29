<?php

namespace App\Http\Controllers;

use App\Models\Cousrses;
use App\Models\Subscription;
use App\Traits\RiskAssessment;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use UserTrait, RiskAssessment;

    public function dashboard()
    {
        $subscription_model = new Subscription();
        $subscriptions = $subscription_model->where("user_id",Auth::user()->id)->get();

        if(session()->get("bmi"))
        {
            $bmi_from_assessment = session()->get("bmi");
            $health_data_from_assement = $this->getHealthData();
            $user_healthy_weight = $this->userHealthyWeight($health_data_from_assement->height);
         

            $risk_score = $this->get_user_single_assessment_result($health_data_from_assement)[0]["risk_score"];
            return view("dashboard.home",compact("subscriptions","bmi_from_assessment","health_data_from_assement","user_healthy_weight","user_set_goal","risk_score"));

        }
        

        if(session()->get("set-goal") != false)
        {
            $user_set_goal  = $this->getGoalSetted();
            return view("dashboard.home",compact("subscriptions","bmi_from_assessment","health_data_from_assement","user_healthy_weight","user_set_goal","risk_score"));

        }

        return view("dashboard.home",compact("subscriptions"));
        
    }
}
