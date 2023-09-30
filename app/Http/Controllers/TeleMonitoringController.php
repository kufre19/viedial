<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monolog\Handler\TelegramBotHandler;

class TeleMonitoringController extends Controller
{
    public function index()
    {
        return view("dashboard.tele-monitoring.index");
        
    }

    public function save_numbers(Request $request)
    {
       return redirect()->to(route("tele-monitoring.index"))->with("numbers-saved","numbers saved");
    }

    public function getInputNotification(Request $request)
    {
        $field_name = $request->input('fieldName');
        $value = $request->input('value');
        $unit = $request->input('unit');
        $message = "";
        
        if($field_name == "bp_systolic")
        {
            if($value > 121 || $value <= 140)
            {
                $message = "⚠️ Your blood pressure is slightly high. You need to watch it";
            }
        }



        return response()->json(["message"=>$message]);


    }

}
