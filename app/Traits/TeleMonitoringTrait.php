<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait TeleMonitoringTrait{
    use RiskAssessment, GoalSettingsTrait;

    public function getUserCaloriesReqs()
    {
        $user_id = Auth::user()->id;
        $health_data_from_assement = $this->getHealthData();
        $user_set_goal  = $this->getGoalSetted();
        $target_weight_per_week = $user_set_goal->weight_loss_goal;

        if($health_data_from_assement->gender == "female")
        {
            $calories_to_remove = 1 * 1000;
            $PA = 1.2;
            $constant_num = 655.1;
            $conversion_weight = 9.563;
            $conversion_height = 1.85;
            $conversion_age = 4.676;
            $weight = $health_data_from_assement->weight;
            $height_cm = $health_data_from_assement->height * 100;
            $age = $health_data_from_assement->age;
            $calories_required = $PA *($constant_num +($conversion_weight * $weight) + ($height_cm * $conversion_height)-($age * $conversion_age));
            $calories_to_eat = $calories_required - ($calories_to_remove * 0.75);
            $calories_to_burn = $calories_required/4;
        }else {
            $calories_to_remove = 1 * 1000;
            $PA = 1.2;
            $constant_num = 66.5;
            $conversion_weight = 13.75;
            $conversion_height = 5.003;
            $conversion_age = 6.75;
            $weight = $health_data_from_assement->weight;
            $height_cm = $health_data_from_assement->height * 100;
            $age = $health_data_from_assement->age;
            $calories_required = $PA *($constant_num +($conversion_weight * $weight) + ($height_cm * $conversion_height)-($age * $conversion_age));
    
            $calories_to_eat = $calories_required - ($calories_to_remove * 0.75);
            $calories_to_burn = $calories_required/4;
        }
       

        $calories_to_eat = number_format($calories_to_eat,2);
        $calories_to_burn = number_format($calories_to_burn,2);
        $reqs_protein_oil = $this->protein_and_oil($weight,$calories_required);



        return ["calores_exercise"=>$calories_to_burn,"calories_eat"=>$calories_to_eat,"reqs_protein_oil"=>$reqs_protein_oil];
    }

    public function protein_and_oil($weight,$calories_required)
    {
        $constant_num_protein = 0.8;
        $constant_num_fat = 0.35;
        $amount_of_protein = $weight * $constant_num_protein;
        $amount_of_fat = $calories_required * $constant_num_fat;
        $recomm_spoon_of_olive_oil = $amount_of_fat /120;

        $amount_of_protein = number_format($amount_of_protein,2);
        $amount_of_fat = number_format($amount_of_fat,2);
        $recomm_spoon_of_olive_oil = ceil($recomm_spoon_of_olive_oil);


        return ["amount_of_protein"=>$amount_of_protein,"amount_of_fat"=>$amount_of_fat,"recomm_spoon_of_olive_oil"=>$recomm_spoon_of_olive_oil];
    }
    
}