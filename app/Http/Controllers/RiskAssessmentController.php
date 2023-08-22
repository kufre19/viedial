<?php

namespace App\Http\Controllers;

use App\Traits\RiskAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class RiskAssessmentController extends Controller
{
    use RiskAssessment;

    public function start(Request $request)
    {
        $start_qs_1 = $request->input("start_qs_1");
        $start_qs_2 = $request->input("start_qs_2");

        Session::put("start_qs_1", $start_qs_1);
        Session::put("start_qs_2", $start_qs_2);

        if ($start_qs_1 == "yes" && $start_qs_2 == "yes") {
            // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)
            return redirect()->to("risk-assessment/cvd");
        }


        if ($start_qs_1 == "no" && $start_qs_2 == "yes") {
            // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)
            return redirect()->to("risk-assessment/cvd");
        }
        if ($start_qs_1 == "no" && $start_qs_2 == "no") {
            // ACTION: SCREEN FOR RISK OF DEVELOPING TYPE 2 DIABETES
            return redirect()->to("risk-assessment/type-2-diabetes");
        }

        if ($start_qs_1 == "yes" && $start_qs_2 == "no") {
            // ACTION SCREEN FOR RISK OF TWO THINGS
            // RISK OF  HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE  
            // RISK OF DEVELOPNG TYPE 2 DIABETES
            return redirect()->to("risk-assessment/diabetes-cvd");
        }
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
        $weight = $this->convert_weight($request->input('weight'), $request->input('weightUnit'));
        $height = $this->convert_height($request->input('height_m'), $request->input('height_ft'), $request->input('height_in'));
        $waist_width = $this->convert_waistWidth($request->input('waist_width'), $request->input('waist_width_unit'));
        $exercise = $request->input('exercise');
        $eat_vegie = $request->input('eat_vegie');
        $treatment = $request->input('treatment');
        $tested_hbp = $request->input('tested_hbp');
        $fam_diabetes = $request->input('fam_diabetes');


        if ($gender == "other") {
            $gender = "female";
        }






        // start collecting points
        $agecat = $this->ageCatHbp($age);
        $bmi = $this->calculateBMI($weight, $height);
        $bmi_cat = $this->categorizeBMI($bmi);
        $waist_cat = $this->categorizeWaist($waist_width, $gender);

        $extra_point = 0;

        // $fam_diabetes = ($fam_diabetes === 'yes') ? 5 : (($fam_diabetes === 'no') ? 0 : null);
        // family with daibetes score
        switch ($fam_diabetes) {
            case 'yes_1':
                $fam_diabetes = 3;
                break;
            case 'yes_2':
                $fam_diabetes = 5;
                break;

            case 'no':
                $fam_diabetes = 0;
                break;

            default:
                # code...
                break;
        }


        $tested_hbp = ($tested_hbp === 'yes') ? 5 : (($tested_hbp === 'no') ? 0 : null);
        $treatment = ($treatment === 'yes') ? 2 : (($treatment === 'no') ? 0 : null);
        $eat_vegie = ($eat_vegie === 'yes') ? 0 : (($eat_vegie === 'no') ? 1 : null);
        $exercise = ($exercise === 'yes') ? 0 : (($exercise === 'no') ? 2 : null);


        $extra_point = $fam_diabetes + $tested_hbp + $treatment + $eat_vegie;




        $risk_score = $agecat + $bmi_cat + $waist_cat + $extra_point;
        $risk_implication = "";
        $risk_recommendation = "";
        $recommendation_link = "";
        $result_messages = Config::get("result_msg_1");




        if ($risk_score <= 6) {
            $risk_implication = $result_messages[0]["risk_implication"];
            $risk_recommendation = $result_messages[0]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 7 && $risk_score <= 11) {
            $risk_implication = $result_messages[1]["risk_implication"];
            $risk_recommendation = $result_messages[1]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 12 && $risk_score <= 14) {
            $risk_implication = $result_messages[2]["risk_implication"];
            $risk_recommendation = $result_messages[2]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 15 && $risk_score <= 20) {
            $risk_implication = $result_messages[3]["risk_implication"];
            $risk_recommendation = $result_messages[3]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 21) {
            $risk_implication = $result_messages[4]["risk_implication"];
            $risk_recommendation = $result_messages[4]["risk_recommendation"];
            $recommendation_link = "#";
        }
        // dd($risk_recommendation);

        // dd($tested_hbp,$treatment,$eat_vegie,$fam_diabetes,$exercise);

        return view('dashboard.risk-assessment.results', compact("risk_score", "risk_implication", "recommendation_link", "risk_recommendation"));
    }


    public function scenario_two(Request $request)
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
        $weight = $this->convert_weight($request->input('weight'), $request->input('weightUnit'));
        $height = $this->convert_height($request->input('height_m'), $request->input('height_ft'), $request->input('height_in'));
        $treating_cvd = $request->input("treating_cvd");
        $systolic_pressure = $request->input("systolic_pressure");
        $smoking = $request->input("smoking");
        $fam_cvd = $request->input("fam_cvd");
        $bmi = $this->calculateBMI($weight, $height);


        if ($gender == "other") {
            $gender = "female";
        }

        $treating_cvd = ($treating_cvd === 'yes') ? 1 : (($treating_cvd === 'no') ? 0 : null);
        $smoking = ($smoking === 'yes') ? 4 : (($smoking === 'no') ? 0 : null);
        $fam_cvd = ($fam_cvd === 'yes') ? 2 : (($fam_cvd === 'no') ? 1 : null);






        // start collecting points
        $agecat = $this->ageCatCvd($age, $gender);
        $bmi_cat = $this->categorizeBMI($bmi, "cvd");
        $systolic_cat = $this->getSysCat($gender, $treating_cvd, $systolic_pressure);
        $extra_point = 0 + $smoking;

        $risk_score = $agecat + $extra_point + $bmi_cat + $systolic_cat;
        $risk_score_percentage = $this->getRiskPercentage($gender, $risk_score);
        $result_messages = Config::get("result_msg_2");


        if ($risk_score_percentage <= 9) {
            $risk_implication = $result_messages[0]["risk_implication"];
            $risk_recommendation = $result_messages[0]["risk_recommendation"];
            $recommendation_link = "#";
            $chart_color = "#1CCE00";
        } elseif ($risk_score_percentage >= 10 && $risk_score_percentage <= 19) {
            $risk_implication = $result_messages[1]["risk_implication"];
            $risk_recommendation = $result_messages[1]["risk_recommendation"];
            $recommendation_link = "#";
            $chart_color = "#F34D00";
        } else {
            $risk_implication = $result_messages[2]["risk_implication"];
            $risk_recommendation = $result_messages[2]["risk_recommendation"];
            $recommendation_link = "#";
            $chart_color = "#ea1f09";
        }






        return view('dashboard.risk-assessment.results', compact("chart_color", "risk_score", "risk_implication", "recommendation_link", "risk_recommendation", "risk_score_percentage"));
    }

    public function scenario_three(Request $request)
    {
        // collecting data from request
        // diabetes and cvd
        $age = $request->input('age');
        $gender = $request->input('gender');
        $weight = $this->convert_weight($request->input('weight'), $request->input('weightUnit'));
        $height = $this->convert_height($request->input('height_m'), $request->input('height_ft'), $request->input('height_in'));
        $waist_width = $this->convert_waistWidth($request->input('waist_width'), $request->input('waist_width_unit'));
        $exercise = $request->input('exercise');
        $eat_vegie = $request->input('eat_vegie');
        $treatment = $request->input('treatment');
        $tested_hbp = $request->input('tested_hbp');
        $fam_diabetes = $request->input('fam_diabetes');
        $treating_cvd = $request->input("treating_cvd");
        $systolic_pressure = $request->input("systolic_pressure");
        $smoking = $request->input("smoking");
        $fam_cvd = $request->input("fam_cvd");
        if ($gender == "other") {
            $gender = "female";
        }

       

    
        // start collecting points
        // diabetes
        $agecat = $this->ageCatHbp($age);
        $bmi = $this->calculateBMI($weight, $height);
        $bmi_cat = $this->categorizeBMI($bmi);
        $waist_cat = $this->categorizeWaist($waist_width, $gender);

        // $fam_diabetes = ($fam_diabetes === 'yes') ? 5 : (($fam_diabetes === 'no') ? 0 : null);
        // family with daibetes score
        switch ($fam_diabetes) {
            case 'yes_1':
                $fam_diabetes = 3;
                break;
            case 'yes_2':
                $fam_diabetes = 5;
                break;

            case 'no':
                $fam_diabetes = 0;
                break;

            default:
                # code...
                break;
        }


        $tested_hbp = ($tested_hbp === 'yes') ? 5 : (($tested_hbp === 'no') ? 0 : null);
        $treatment = ($treatment === 'yes') ? 2 : (($treatment === 'no') ? 0 : null);
        $eat_vegie = ($eat_vegie === 'yes') ? 0 : (($eat_vegie === 'no') ? 1 : null);
        $exercise = ($exercise === 'yes') ? 0 : (($exercise === 'no') ? 2 : null);


        $extra_point = $fam_diabetes + $tested_hbp + $treatment + $eat_vegie;
        // end collecting points
        // diabetes



        // start adding points and calculating scores diabetes
        $risk_score = $agecat + $bmi_cat + $waist_cat + $extra_point;
        $risk_implication = "";
        $risk_recommendation = "";
        $recommendation_link = "";
        $result_messages = Config::get("result_msg_1");


        if ($risk_score <= 6) {
            $risk_implication = $result_messages[0]["risk_implication"];
            $risk_recommendation = $result_messages[0]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 7 && $risk_score <= 11) {
            $risk_implication = $result_messages[1]["risk_implication"];
            $risk_recommendation = $result_messages[1]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 12 && $risk_score <= 14) {
            $risk_implication = $result_messages[2]["risk_implication"];
            $risk_recommendation = $result_messages[2]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 15 && $risk_score <= 20) {
            $risk_implication = $result_messages[3]["risk_implication"];
            $risk_recommendation = $result_messages[3]["risk_recommendation"];
            $recommendation_link = "#";
        } elseif ($risk_score >= 21) {
            $risk_implication = $result_messages[4]["risk_implication"];
            $risk_recommendation = $result_messages[4]["risk_recommendation"];
            $recommendation_link = "#";
        }
        $risk_score_diabete = $risk_score;
        // end adding points and calculating scores diabetes



       

        // start collecting points
        $agecat = $this->ageCatCvd($age, $gender);
        $bmi_cat = $this->categorizeBMI($bmi, "cvd");
        $systolic_cat = $this->getSysCat($gender, $treating_cvd, $systolic_pressure);
        $treating_cvd = ($treating_cvd === 'yes') ? 1 : (($treating_cvd === 'no') ? 0 : null);
        $smoking = ($smoking === 'yes') ? 4 : (($smoking === 'no') ? 0 : null);
        $fam_cvd = ($fam_cvd === 'yes') ? 2 : (($fam_cvd === 'no') ? 1 : null);
        $extra_point = 0 + $smoking;

        // start adding points and calculating scores diabetes

        $risk_score = $agecat + $extra_point + $bmi_cat + $systolic_cat;
        $risk_score_percentage = $this->getRiskPercentage($gender, $risk_score);
        $result_messages = Config::get("result_msg_2");


        if ($risk_score_percentage <= 9) {
            $risk_implication_cvd = $result_messages[0]["risk_implication"];
            $risk_recommendation_cvd = $result_messages[0]["risk_recommendation"];
            $recommendation_link_cvd = "#";
            $chart_color = "#1CCE00";
        } elseif ($risk_score_percentage >= 10 && $risk_score_percentage <= 19) {
            $risk_implication_cvd = $result_messages[1]["risk_implication"];
            $risk_recommendation_cvd = $result_messages[1]["risk_recommendation"];
            $recommendation_link = "#";
            $chart_color = "#F34D00";
        } else {
            $risk_implication_cvd = $result_messages[2]["risk_implication"];
            $risk_recommendation_cvd = $result_messages[2]["risk_recommendation"];
            $recommendation_link_cvd = "#";
            $chart_color = "#ea1f09";
        }
        // end adding points and calculating scores diabetes

        $risk_score_cvd = $risk_score;
        $risk_score_percentage_cvd = $risk_score_percentage;
        session()->put("second_results","");

        return view('dashboard.risk-assessment.results', compact("chart_color","risk_score_diabete","risk_score_cvd", "risk_implication","risk_implication_cvd", "recommendation_link", "risk_recommendation","risk_recommendation_cvd","recommendation_link_cvd", "risk_score_percentage_cvd"));



    }







}
