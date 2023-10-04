<?php

namespace App\Http\Controllers;

use App\Models\RiskAssessment as ModelsRiskAssessment;
use App\Traits\RiskAssessment;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class RiskAssessmentController extends Controller
{
    use RiskAssessment, UserTrait;

    public function start(Request $request)
    {
        $start_qs_1 = $request->input("start_qs_1");
        $start_qs_2 = $request->input("start_qs_2");

        Session::put("have_hypertension", $start_qs_1);
        Session::put("have_diabetes", $start_qs_2);

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

    public function scenario_one(Request $request, $skip_view = false)
    {
        // dd($request->all());
        $messages = [
            'age.required' => 'Age is required.',
            'age.integer' => 'Age should be an integer value. i.e 50',
            'age.min' => 'Age cannot be negative.',

            'weight.required' => 'Weight is mandatory.',
            'weight.numeric' => 'Weight should be a number.',

            'height_m.numeric' => 'Height in meters should be a numeric value.',
            'height_m.min' => 'Height in meters cannot be negative.',

            'height_ft.numeric' => 'Height in feet should be numeric.',
            'height_ft.min' => 'Height in feet cannot be negative.',

            'height_in.numeric' => 'Height in inches should be numeric.',
            'height_in.min' => 'Height in inches cannot be negative.',

            'waist_width.required' => 'Waist line width is required.',
            'waist_width.numeric' => 'Waist line width should be numeric.',
            'waist_width.min' => 'Waist line width cannot be negative.'
        ];

        $request->validate([
            'age' => 'required|integer|min:0',
            'weight' => 'required|numeric',
            'height_m' => 'nullable|numeric|min:0',
            'height_ft' => 'nullable|numeric|min:0',
            'height_in' => 'nullable|numeric|min:0',
            'waist_width' => 'required|numeric|min:0',
        ]);

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

        $data = [
            "gender" => $gender,
            "age" => $age,
            "weight" => $weight,
            "height" => $height,
            "treating_hbp" => $tested_hbp,
            "waistline" => $waist_width,
            "exercise" => $exercise,
            "eat_vegie" => $eat_vegie,
            "treated_sugar_hbp" => $tested_hbp,
            "fam_diabetes" => $fam_diabetes,

        ];
        $this->save_assessment_entry($data);


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

        $recommendation_link = "https://viedial.com/shop/";
        // dd($tested_hbp,$treatment,$eat_vegie,$fam_diabetes,$exercise);


        if ($skip_view) {
            return [
                "risk_score" => $risk_score,
                "risk_implication" => $risk_implication,
                "recommendation_link" => $recommendation_link,
                "risk_recommendation" => $risk_recommendation
            ];
        }

        $this->userHasBmi();
        return view('dashboard.risk-assessment.results', compact("risk_score", "risk_implication", "recommendation_link", "risk_recommendation"));
    }


    public function scenario_two(Request $request, $skip_view = false)
    {
        $messages = [
            'age.required' => 'Age is required.',
            'age.integer' => 'Age should be an integer value. i.e 50',
            'age.min' => 'Age cannot be negative.',

            'weight.required' => 'Weight is mandatory.',
            'weight.numeric' => 'Weight should be a number.',

            'height_m.numeric' => 'Height in meters should be a numeric value.',
            'height_m.min' => 'Height in meters cannot be negative.',

            'height_ft.numeric' => 'Height in feet should be numeric.',
            'height_ft.min' => 'Height in feet cannot be negative.',

            'height_in.numeric' => 'Height in inches should be numeric.',
            'height_in.min' => 'Height in inches cannot be negative.',

            'systolic_pressure.required' => 'Systolic Blood Pressure is reqired',
            'systolic_pressure.numeric' => 'Systolic Blood Pressure should be numeric.',
            'systolic_pressure.min' => 'Systolic Blood Pressure cannot be negative.'
        ];

        $validation = $request->validate([
            'age' => 'required|integer|min:0',
            'weight' => 'required|numeric',
            'height_m' => 'nullable|numeric|min:0',
            'height_ft' => 'nullable|numeric|min:0',
            'height_in' => 'nullable|numeric|min:0',
            'systolic_pressure' => 'required|numeric|min:0'
        ], $messages);


        $age = $request->input('age');
        $gender = $request->input('gender');
        $weight = $this->convert_weight($request->input('weight'), $request->input('weightUnit'));
        $height = $this->convert_height($request->input('height_m'), $request->input('height_ft'), $request->input('height_in'));
        $treating_cvd = $request->input("treatment");
        $systolic_pressure = $request->input("systolic_pressure");
        $smoking = $request->input("smoking");
        $fam_cvd = $request->input("fam_cvd");
        $bmi = $this->calculateBMI($weight, $height);


        if ($gender == "other") {
            $gender = "female";
        }


        $data = [
            "gender" => $gender,
            "age" => $age,
            "weight" => $weight,
            "height" => $height,
            "treating_hbp" => $treating_cvd,
            "systolic_bp" => $systolic_pressure,
            "smoking" => $smoking,
            "fam_cvd" => $fam_cvd,

        ];
        $this->save_assessment_entry($data);

        $treating_cvd = ($treating_cvd === 'yes') ? 1 : (($treating_cvd === 'no') ? 0 : null);
        $smoking = ($smoking === 'yes') ? 4 : (($smoking === 'no') ? 0 : null);
        $fam_cvd = ($fam_cvd === 'yes') ? 2 : (($fam_cvd === 'no') ? 1 : null);






        // start collecting points
        $agecat = $this->ageCatCvd($age, $gender);
        $bmi_cat = $this->categorizeBMI($bmi, "cvd");
        $systolic_cat = $this->getSysCat($gender, $treating_cvd, $systolic_pressure);
        $extra_point = 0 + $smoking;

        $risk_score = $agecat + $extra_point + $bmi_cat + $systolic_cat;
        $risk_score = $risk_score * $fam_cvd;
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

        $recommendation_link = "https://viedial.com/shop/";





        if ($skip_view) {
            return [
                "risk_score" => $risk_score,
                "risk_implication" => $risk_implication,
                "recommendation_link" => $recommendation_link,
                "risk_recommendation" => $risk_recommendation
            ];
        }
        $this->userHasBmi();
        return view('dashboard.risk-assessment.results', compact("chart_color", "risk_score", "risk_implication", "recommendation_link", "risk_recommendation"));
    }

    public function scenario_three(Request $request)
    {


        $load_score_diabetes = $this->scenario_one($request, true);
        $load_score_cvd = $this->scenario_two($request, true);

        $risk_recommendation = $load_score_diabetes['risk_recommendation'];
        $risk_implication = $load_score_diabetes['risk_implication'];
        $recommendation_link = $load_score_diabetes['recommendation_link'];
        $risk_score_diabete = $load_score_diabetes['risk_score'];

        $risk_score_cvd = $load_score_cvd['risk_score'];
        $risk_implication_cvd = $load_score_cvd['risk_implication'];
        $recommendation_link_cvd = $load_score_cvd['recommendation_link'];
        $risk_recommendation_cvd = $load_score_cvd['risk_recommendation'];
        $second_result = true;

        $this->userHasBmi();
        return view('dashboard.risk-assessment.results', compact("second_result", "risk_score_diabete", "risk_score_cvd", "risk_implication", "risk_implication_cvd", "recommendation_link", "risk_recommendation", "risk_recommendation_cvd", "recommendation_link_cvd"));
    }


    public function get_user_results()
    {
        $risk_model = new ModelsRiskAssessment();
        $entires = $risk_model->where('user_id', Auth::user()->id)->get();
        $result_list = [];
        foreach ($entires as $key => $value) {
            $start_qs_1 = $value['have_hypertension'];
            $start_qs_2 = $value['have_diabetes'];

            if ($start_qs_1 == "yes" && $start_qs_2 == "yes") {
                // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)
                $result = $this->result_cvd($value);
            }


            if ($start_qs_1 == "no" && $start_qs_2 == "yes") {
                // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)
                $result = $this->result_cvd($value);
            }
            if ($start_qs_1 == "no" && $start_qs_2 == "no") {
                // ACTION: SCREEN FOR RISK OF DEVELOPING TYPE 2 DIABETES
                $result = $this->result_diabetes($value);

            }

            if ($start_qs_1 == "yes" && $start_qs_2 == "no") {
                // ACTION SCREEN FOR RISK OF TWO THINGS
                // RISK OF  HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE  
                // RISK OF DEVELOPNG TYPE 2 DIABETES
                $result_1 = $this->result_cvd($value);
                $result = $this->result_diabetes($value);

            array_push($result_list,$result);
                
            }
            array_push($result_list,$result);
        }
        // return view("dashboard.assessment_results",compact("result_list"));
        return $result_list;
    }
}
