<?php

namespace  App\Traits;

use App\Models\RiskAssessment as ModelsRiskAssessment;
use Illuminate\Support\Facades\Auth;
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
    // to meters
    public function convert_height($height_m,$height_ft,$heigh_in)
    {

        $new_height = "";
        if($heigh_in != "" || $height_ft !="")
        {
            
            $new_height = ($height_ft * 12 + $heigh_in) * 0.0254;
            return $new_height;
        }else{
            return $height_m;
        }
       
    }

    /** 
    * convert to KG 
    */
    public function convert_weight($weight,$unit)
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
    public function convert_waistWidth($waist_width,$unit)
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

    public function ageCatCvd($age, $gender) {
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
    private function categorizeBMI($bmi,$cat_for=""): int
    {
        if ($bmi < 25) {
            return 0;
        } elseif ($bmi >= 25 && $bmi < 30) {
            return 1;
        } else { // >= 30
            if($cat_for == "cvd")
            {
                return 2;
            }else {
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

        // Return BMI (you can also return it as part of a view or JSON response)
        return $bmi;
    }


    public function getSysCat($gender, $treatCvd, $systolicBp) {
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

    public function getRiskPercentage($gender,$risk_score)
    {
        $risk_score_percentage = 0 ;
        if($gender == "male")
        {
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
            }elseif ($risk_score == 11) {
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
        }else {
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
            }elseif ($risk_score == 14) {
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






}