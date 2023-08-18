<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RiskAssessmentController extends Controller
{
    public function start(Request $request)
    {
        $start_qs_1 = $request->input("start_qs_1");
        $start_qs_2 = $request->input("start_qs_2");

        Session::put("start_qs_1", $start_qs_1);
        Session::put("start_qs_2", $start_qs_2);

        if ($start_qs_1 == "yes" && $start_qs_2 == "yes") {
            // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)

        }


        if ($start_qs_1 == "no" && $start_qs_2 == "yes") {
            // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)

        }
        if ($start_qs_1 == "no" && $start_qs_2 == "no") {
            // ACTION: SCREEN FOR RISK OF DEVELOPING TYPE 2 DIABETES
            return redirect()->to("risk-assessment/type-2-diabetes");
        }

        // if($start_qs_1 == "yes" && $start_qs_2 == "no")
        // {
        //     // 
        // }

    }

    public function scenario_one(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'age' => 'required|integer',
        //     'weight' => 'required|numeric',
        //     'height' => 'required|numeric',
        //     'waist_width' => 'required|numeric',
        // ]);
        $age = $request->input('age');
        $gender = $request->input('gender');
        $weight = $request->input('weight');
        $height = $request->input('height');
        $weightUnit = $request->input('weightUnit');
        $waist_width = $request->input('waist_width');
        $exercise = $request->input('exercise');
        $eat_vegie = $request->input('eat_vegie');
        $treatment = $request->input('treatment');
        $tested_hbp = $request->input('tested_hbp');
        $fam_diabetes = $request->input('fam_diabetes');







        $agecat = $this->ageCat($age);
        $bmi = $this->calculateBMI($weight, $weightUnit, $height);
        $bmi_cat = $this->categorizeBMI($bmi);
        $waist_cat = $this->categorizeWaist($waist_width, $gender);

        $extra_point = 0;

        $fam_diabetes = ($fam_diabetes === 'yes') ? 5 : (($fam_diabetes === 'no') ? 0 : null);
        $tested_hbp = ($tested_hbp === 'yes') ? 5 : (($tested_hbp === 'no') ? 0 : null);
        $treatment = ($treatment === 'yes') ? 2 : (($treatment === 'no') ? 0 : null);
        $eat_vegie = ($eat_vegie === 'yes') ? 0 : (($eat_vegie === 'no') ? 1 : null);
        $exercise = ($exercise === 'yes') ? 0 : (($exercise === 'no') ? 1 : null);


        $extra_point = $fam_diabetes + $tested_hbp + $treatment +$eat_vegie;



        
        $risk_score = $agecat + $bmi_cat + $waist_cat + $extra_point;
        $risk_implication = "";
        $risk_recommendation = "";
        $recommendation_link= "";



        if ($risk_score <= 6) {
            $risk_implication = "You have very low risk of developing type 2 diabetes within 10 years. It is estimated that 1 in 100 will develop type 2 diabetes.";
            $risk_recommendation = "Sign up for our preventing pre-diabetes program.";
            $recommendation_link = "#";
        } elseif ($risk_score >= 7 && $risk_score <= 11) {
            $risk_implication = "You have low risk of developing type 2 diabetes within 10 years. It is estimated that 7 in 25 will develop type 2 diabetes. 
            ";
            $risk_recommendation = "Sign up for our preventing pre-diabetes program ";
            $recommendation_link = "#";

        } elseif ($risk_score >= 12 && $risk_score <= 14) {
            $risk_implication = "You have moderate risk of developing type 2 diabetes within 10 years. It is estimated that 1 in 6 will develop type 2 diabetes. 
            ";
            $risk_recommendation = "Sign up for Viedial’s type 2 diabetes prevention program to reduce your risk of developing type 2 diabetes. This program will teach you how to lower the chance of developing type 2 diabetes by as much as 80%.";
            $recommendation_link = "#";

        }elseif ($risk_score >= 15 && $risk_score <= 20) {
            $risk_implication = "You have a high risk of developing type 2 diabetes within 10 years. It is estimated that 1 in 3 will develop type 2 diabetes.";
            $risk_recommendation = "Recommendation: Sign up for Viedial’s type 2 diabetes prevention program to reduce your risk of developing type 2 diabetes. This program will teach you how to lower the chance of developing type 2 diabetes by as much as 80%.";
            $recommendation_link = "#";

        }elseif ($risk_score >= 21 ) {
            $risk_implication = "You have a very high risk of developing type 2 diabetes within 10 years. It is estimated that 1 in 2 will develop type 2 diabetes.";
            $risk_recommendation = "Sign up for Viedial’s type 2 diabetes prevention program to reduce your risk of developing type 2 diabetes. This program will teach you how to lower the chance of developing type 2 diabetes by as much as 80%.             ";

            $recommendation_link = "#";

        }

        // dd($risk_message,$agecat,$bmi,$bmi_cat,$risk_score);

        return view('dashboard.risk-assessment.results',compact("risk_score","risk_implication","recommendation_link","risk_recommendation"));
    }


    public function ageCat($age)
    {
        // Step Two: Create agecat variable
        $agecat = 0;
        // Step Three: Apply conditional logic to set agecat
        if ($age >= 0 && $age <= 44) {
            $agecat = 0;
        } elseif ($age >= 45 && $age <= 54) {
            $agecat = 2;
        } elseif ($age >= 55 && $age <= 64) {
            $agecat = 3;
        } elseif ($age >= 65) {
            $agecat = 4;
        }

        return $agecat;
    }

    public function calculateBMI($weight, $weightUnit, $height)
    {
        // Convert weight to kilograms if it's in pounds
        if ($weightUnit === 'lbs') {
            $weight = $this->poundsToKilograms($weight);
        }
        // Calculate BMI
        $bmi = $weight / ($height * $height);

        // Return BMI (you can also return it as part of a view or JSON response)
        return $bmi;
    }

    /**
     * Convert pounds to kilograms.
     *
     * @param  mixed  $pounds
     * @return float
     */
    private function poundsToKilograms($pounds): float
    {
        return $pounds * 0.45359237;
    }



    /**
     * Categorize BMI into BMICAT.
     *
     * @param  mixed  $bmi
     * @return int
     */
    private function categorizeBMI($bmi): int
    {
        if ($bmi < 25) {
            return 0;
        } elseif ($bmi >= 25 && $bmi < 30) {
            return 1;
        } else { // >= 30
            return 3;
        }
    }

    /**
     * Categorize waist circumference into WAISTCAT based on sex.
     *
     * @param  mixed  $waistCircumference
     * @param  string $sex ('male' or 'female')
     * @return int
     */
    private function categorizeWaist($waistCircumference, string $sex): int
    {
        if ($sex === 'male') {
            if ($waistCircumference < 94) {
                return 0;
            } elseif ($waistCircumference >= 94 && $waistCircumference < 103) {
                return 3;
            } else { // 103 and above
                return 4;
            }
        } elseif ($sex === 'female') {
            if ($waistCircumference < 80) {
                return 0;
            } elseif ($waistCircumference >= 80 && $waistCircumference < 89) {
                return 3;
            } else { // 89 and above
                return 4;
            }
        } else {
            // Unknown sex; handle accordingly, maybe throw an exception or default value.
            throw new \InvalidArgumentException("Unknown sex: {$sex}");
        }
    }
}
