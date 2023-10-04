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
         

            $assessment_result = $this->get_user_assessment_result_score_Card($health_data_from_assement);

            if(session()->get("set-goal") == false)
            {
                return view("dashboard.home",compact("subscriptions","bmi_from_assessment","health_data_from_assement","user_healthy_weight","assessment_result"));
            }

        }
        

        if(session()->get("set-goal") != false)
        {
            $user_set_goal  = $this->getGoalSetted();
            return view("dashboard.home",compact("subscriptions","bmi_from_assessment","health_data_from_assement","user_healthy_weight","user_set_goal","assessment_result"));

        }

        return view("dashboard.home",compact("subscriptions"));
        
    }
}
