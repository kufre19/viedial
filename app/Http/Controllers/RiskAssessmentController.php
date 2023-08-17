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

        }

        if($start_qs_1 == "yes" && $start_qs_2 == "no")
        {
            
        }

        if($start_qs_1 == "no" && $start_qs_2 == "yes")
        {
            
        }
        if($start_qs_1 == "no" && $start_qs_2 == "no")
        {
            
        }


    }
}
