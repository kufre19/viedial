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

        Session::put("start_qs_1",$start_qs_1);
        Session::put("start_qs_2",$start_qs_2);

        if($start_qs_1 == "yes" && $start_qs_2 == "yes")
        {
            // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)

        }

       
        if($start_qs_1 == "no" && $start_qs_2 == "yes")
        {
            // ACTION SCREEN FOR RISK OF ONLY CVD (HAVING A HEART ATTACK OR STROKE OR KIDNEY FAILURE)

        }
        if($start_qs_1 == "no" && $start_qs_2 == "no")
        {
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
        dd($request);
    }
}
