<?php

namespace App\Traits;

use App\Models\GoalSettings;
use App\Models\RiskAssessment;
use App\Traits\RiskAssessment as TraitsRiskAssessment;
use Illuminate\Support\Facades\Auth;

trait  UserTrait
{
    use TraitsRiskAssessment, GoalSettingsTrait;

    public function userHasBmi()
    {
        $this->loadHealthData();
        $health_data_set = session()->get("health_data");
        $health_data = $this->getHealthData();
        if ($health_data_set != false) {
            // dd($health_data->height,$health_data->weight);
           
            $bmi = $this->calculateBMI($health_data->weight,$health_data->height);
            $bmi = number_format($bmi,1);
            session()->put("bmi", $bmi);
        } else {
            session()->put("bmi", false);
        }
    }

    public function userHasGoalSet()
    {

        $goal_set = $this->getGoalSetted();
        if ($goal_set) {
            session()->put("set-goal", true);
        } else {
            session()->put("set-goal", false);
        }
    }

    public function loadHealthData()
    {
        $health_data = $this->getHealthData();
        if ($health_data) {
            session()->put("health_data", true);
        } else {
            session()->put("health_data", false);
        }
    }


    public function userHealthyWeight($heigt)
    {
      
        $ideal_weight = 24.9 * ($heigt/100) * ($heigt/100);
        $ideal_weight = number_format($ideal_weight,2);
        return $ideal_weight;
    }
}
