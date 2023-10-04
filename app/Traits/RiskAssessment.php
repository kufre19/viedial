<?php

namespace  App\Traits;

use App\Models\RiskAssessment as ModelsRiskAssessment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

trait RiskAssessment
{


    public function save_assessment_entry(array $data)
    {
        $risk_model = new ModelsRiskAssessment();
        $risk_model->user_id = Auth::user()->id;
        $risk_model->have_hypertension = session()->get("have_hypertension");
        $risk_model->have_diabetes = session()->get("have_diabetes");
        $risk_model->gender = $data['gender'] ?? "NA";
        $risk_model->age = $data['age'] ?? "NA";
        $risk_model->weight = $data['weight'] ?? "NA";
        $risk_model->height = $data['height'] ?? "NA";
        $risk_model->treating_hbp = $data['treating_hbp'] ?? "NA";
        $risk_model->systolic_bp = $data['systolic_bp'] ?? "NA";
        $risk_model->smoking = $data['smoking'] ?? "NA";
        $risk_model->fam_cvd = $data['fam_cvd'] ?? "NA";
        $risk_model->waistline = $data['waistline'] ?? "NA";
        $risk_model->exercise = $data['exercise'] ?? "NA";
        $risk_model->eat_vegie = $data['eat_vegie'] ?? "NA";
        $risk_model->treated_sugar_hbp = $data['treated_sugar_hbp'] ?? "NA";
        $risk_model->fam_diabetes = $data['fam_diabetes'] ?? "NA";
        $risk_model->save();
    }


    public function result_diabetes($data)
    {


        $age = $data['age'];
        $gender = $data['gender'];
        $weight = $data['weight'];
        $height = $data['height'];
        $waist_width = $data['waistline'];
        $exercise = $data['exercise'];
        $eat_vegie = $data['eat_vegie'];
        $treatment = $data['treating_hbp'];
        $tested_hbp = $data['treated_sugar_hbp'];
        $fam_diabetes = $data['fam_diabetes'];




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


        // dd($fam_diabetes,$tested_hbp,$treatment,$eat_vegie);

        // $extra_point = $fam_diabetes + $tested_hbp + $treatment + $eat_vegie;
        $extra_point = intval($fam_diabetes) + intval($tested_hbp) + intval($treatment) + intval($eat_vegie);





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


        return [
            "risk_score" => $risk_score,
            "risk_implication" => $risk_implication,
            "recommendation_link" => $recommendation_link,
            "risk_recommendation" => $risk_recommendation,
            "score_for" => "Type 2 diabetes",
            "age" => $age

        ];
    }

    public function result_cvd($data)
    {



        $age = $data['age'];
        $gender = $data['gender'];
        $weight = $data['weight'];
        $height = $data['height'];
        $treating_cvd = $data['treating_hbp'];
        $systolic_pressure = $data['systolic_bp'];
        $smoking = $data['smoking'];
        $fam_cvd = $data['fam_cvd'];
        $bmi = $this->calculateBMI($weight, $height);



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


        return [
            "risk_score" => $risk_score,
            "risk_implication" => $risk_implication,
            "recommendation_link" => $recommendation_link,
            "risk_recommendation" => $risk_recommendation,
            "score_for" => "CVD",
            "age" => $age

        ];
    }

    // to meters
    public function convert_height($height_m, $height_ft, $heigh_in)
    {

        $new_height = "";
        if ($heigh_in != "" || $height_ft != "") {

            $new_height = ($height_ft * 12 + $heigh_in) * 0.0254;
            return $new_height;
        } else {
            return $height_m;
        }
    }

    /** 
     * convert to KG 
     */
    public function convert_weight($weight, $unit)
    {
        $new_weight = "";
        switch ($unit) {
            case 'lbs':
                $new_weight = $weight * 0.45359237;
                break;

            default:
                $new_weight = $weight;
                break;
        }
        return $new_weight;
    }

    // to centimeters
    public function convert_waistWidth($waist_width, $unit)
    {
        $new_waist_width = "";
        switch ($unit) {
            case 'inches':
                $new_waist_width  = $waist_width * 2.54;
                break;

            default:
                $new_waist_width = $waist_width;
                break;
        }

        return $new_waist_width;
    }


    public function ageCatHbp($age)
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

    public function ageCatCvd($age, $gender)
    {
        // Ensure age is an integer
        $age = intval($age);

        $AGECVD = 0;

        if ($age >= 30 && $age <= 34) {
            $AGECVD = 0;
        } elseif ($age >= 35 && $age <= 39) {
            $AGECVD = 2;
        } elseif ($age >= 40 && $age <= 44) {
            $AGECVD = 5;
        } elseif ($age >= 45 && $age <= 49) {
            $AGECVD = ($gender == 'male') ? 7 : 6;
        } elseif ($age >= 50 && $age <= 54) {
            $AGECVD = 8;
        } elseif ($age >= 55 && $age <= 59) {
            $AGECVD = 10;
        } elseif ($age >= 60 && $age <= 64) {
            $AGECVD = 11;
        } elseif ($age >= 65 && $age <= 69) {
            $AGECVD = ($gender == 'male') ? 13 : 12;
        } elseif ($age >= 70 && $age <= 74) {
            $AGECVD = 14;
        } elseif ($age >= 75) {
            $AGECVD = 15;
        }

        return $AGECVD;
    }




    /**
     * Categorize BMI into BMICAT.
     *
     * @param  mixed  $bmi
     * @return int
     */
    private function categorizeBMI($bmi, $cat_for = ""): int
    {
        if ($bmi < 25) {
            return 0;
        } elseif ($bmi >= 25 && $bmi < 30) {
            return 1;
        } else { // >= 30
            if ($cat_for == "cvd") {
                return 2;
            } else {
                return 3;
            }
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


    public function calculateBMI($weight, $height)
    {

        // Calculate BMI
        $bmi = $weight / ($height * $height);
        return $bmi;
    }


    public function getSysCat($gender, $treatCvd, $systolicBp)
    {
        // Ensure the systolicBp is a float with two decimal places
        $systolicBp = round(floatval($systolicBp), 2);

        $SYSCAT = 0;

        if ($gender == 'male' && $treatCvd == 0) {
            if ($systolicBp < 120) {
                $SYSCAT = -2;
            } elseif ($systolicBp < 130) {
                $SYSCAT = 0;
            } elseif ($systolicBp < 140) {
                $SYSCAT = 1;
            } elseif ($systolicBp < 160) {
                $SYSCAT = 2;
            } else {
                $SYSCAT = 3;
            }
        } elseif ($gender == 'female' && $treatCvd == 0) {
            if ($systolicBp < 120) {
                $SYSCAT = -3;
            } elseif ($systolicBp < 130) {
                $SYSCAT = 0;
            } elseif ($systolicBp < 140) {
                $SYSCAT = 1;
            } elseif ($systolicBp < 150) {
                $SYSCAT = 3;
            } elseif ($systolicBp < 160) {
                $SYSCAT = 4;
            } else {
                $SYSCAT = 5;
            }
        } elseif ($gender == 'male' && $treatCvd == 1) {
            if ($systolicBp < 120) {
                $SYSCAT = 0;
            } elseif ($systolicBp < 130) {
                $SYSCAT = 2;
            } elseif ($systolicBp < 140) {
                $SYSCAT = 3;
            } elseif ($systolicBp < 160) {
                $SYSCAT = 4;
            } else {
                $SYSCAT = 5;
            }
        } elseif ($gender == 'female' && $treatCvd == 1) {
            if ($systolicBp < 120) {
                $SYSCAT = -1;
            } elseif ($systolicBp < 130) {
                $SYSCAT = 2;
            } elseif ($systolicBp < 140) {
                $SYSCAT = 3;
            } elseif ($systolicBp < 150) {
                $SYSCAT = 5;
            } elseif ($systolicBp < 160) {
                $SYSCAT = 6;
            } else {
                $SYSCAT = 8;
            }
        }

        return $SYSCAT;
    }

    public function getRiskPercentage($gender, $risk_score)
    {
        $risk_score_percentage = 0;
        if ($gender == "male") {
            if ($risk_score <= -5) {
                $risk_score_percentage = 0;
            } elseif ($risk_score == -4) {
                $risk_score_percentage = 1.1;
            } elseif ($risk_score == -3) {
                $risk_score_percentage = 1.4;
            } elseif ($risk_score == -2) {
                $risk_score_percentage = 1.6;
            } elseif ($risk_score == -1) {
                $risk_score_percentage = 1.9;
            } elseif ($risk_score == 0) {
                $risk_score_percentage = 2.3;
            } elseif ($risk_score == 1) {
                $risk_score_percentage = 2.8;
            } elseif ($risk_score == 2) {
                $risk_score_percentage = 3.3;
            } elseif ($risk_score == 3) {
                $risk_score_percentage = 4.0;
            } elseif ($risk_score == 4) {
                $risk_score_percentage = 4.7;
            } elseif ($risk_score == 5) {
                $risk_score_percentage = 5.6;
            } elseif ($risk_score == 6) {
                $risk_score_percentage = 6.7;
            } elseif ($risk_score == 7) {
                $risk_score_percentage = 8.0;
            } elseif ($risk_score == 8) {
                $risk_score_percentage = 9.5;
            } elseif ($risk_score == 9) {
                $risk_score_percentage = 11.2;
            } elseif ($risk_score == 10) {
                $risk_score_percentage = 13.3;
            } elseif ($risk_score == 11) {
                $risk_score_percentage = 15.7;
            } elseif ($risk_score == 12) {
                $risk_score_percentage = 18.5;
            } elseif ($risk_score == 13) {
                $risk_score_percentage = 21.7;
            } elseif ($risk_score == 14) {
                $risk_score_percentage = 25.4;
            } elseif ($risk_score == 15) {
                $risk_score_percentage = 29.6;
            } elseif ($risk_score >= 16) {
                $risk_score_percentage = 'Above 30%';
            } else {
                $risk_score_percentage = 1;
            }
        } else {
            if ($risk_score <= -2) {
                $risk_score_percentage = 0;
            } elseif ($risk_score == -1) {
                $risk_score_percentage = 1.0;
            } elseif ($risk_score == 0) {
                $risk_score_percentage = 1.1;
            } elseif ($risk_score == 1) {
                $risk_score_percentage = 1.5;
            } elseif ($risk_score == 2) {
                $risk_score_percentage = 1.8;
            } elseif ($risk_score == 3) {
                $risk_score_percentage = 2.1;
            } elseif ($risk_score == 4) {
                $risk_score_percentage = 2.5;
            } elseif ($risk_score == 5) {
                $risk_score_percentage = 2.9;
            } elseif ($risk_score == 6) {
                $risk_score_percentage = 3.4;
            } elseif ($risk_score == 7) {
                $risk_score_percentage = 3.9;
            } elseif ($risk_score == 8) {
                $risk_score_percentage = 4.6;
            } elseif ($risk_score == 9) {
                $risk_score_percentage = 5.4;
            } elseif ($risk_score == 10) {
                $risk_score_percentage = 6.3;
            } elseif ($risk_score == 11) {
                $risk_score_percentage = 7.4;
            } elseif ($risk_score == 12) {
                $risk_score_percentage = 8.6;
            } elseif ($risk_score == 13) {
                $risk_score_percentage = 10.0;
            } elseif ($risk_score == 14) {
                $risk_score_percentage = 11.6;
            } elseif ($risk_score == 15) {
                $risk_score_percentage = 13.5;
            } elseif ($risk_score == 16) {
                $risk_score_percentage = 15.6;
            } elseif ($risk_score == 17) {
                $risk_score_percentage = 18.1;
            } elseif ($risk_score == 18) {
                $risk_score_percentage = 20.9;
            } elseif ($risk_score == 19) {
                $risk_score_percentage = 24.0;
            } elseif ($risk_score == 20) {
                $risk_score_percentage = 27.5;
            } elseif ($risk_score >= 21) {
                $risk_score_percentage = 'Above 30%';
            } else {
                // Handle cases where the risk score is not among the provided ones 
                // You can choose to set a default value or take other actions
                $risk_score_percentage = 1;
            }
        }
        return $risk_score_percentage;
    }


    public function getHealthData()
    {
        $health_data = ModelsRiskAssessment::where("user_id", Auth::user()->id)->latest()->first();
        return $health_data;
    }



    public  function get_user_assessment_result_score_Card($health_data)
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
                if($value['fam_cvd'] != "NA")
                {
                    $result = $this->result_cvd($value);
                }else{
                    $result = $this->result_diabetes($value);

                }

            // array_push($result_list,$result);
                
            }
            array_push($result_list,$result);
        }
        // return view("dashboard.assessment_results",compact("result_list"));
        return $result_list;
    }
}
