<?php

namespace  App\Traits;


trait RiskAssessment
{
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

    /* 
        to KG 
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






}