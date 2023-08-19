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
}