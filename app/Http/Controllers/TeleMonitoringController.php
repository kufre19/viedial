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
            if($value >= 121 && $value <= 140)
            {
                $message = "⚠️ Your blood pressure is slightly high. You need to watch it";
            }
            elseif($value >= 141 && $value <= 150)
            {
                $message = "⚠️ Your blood pressure is really high. You need to talk to your doctor about starting or changing your treatment";
            }

            elseif($value >= 151 && $value <= 160)
            {
                $message = "🚫 Your blood pressure is dangerously high. You need urgent treatment to prevent it from increasing";
            }
            elseif( $value > 160)
            {
                $message = "🚨🚫 Your blood pressure has reached very dangerous levels. This can cause a complication that will lead to significant health problems or death. You need to see a doctor immediately";
            }else{
                $message = "😊🎉 Great your blood pressure is normal";
            }
        }

        if($field_name == "bp_diastolic")
        {
            if($value >= 81 && $value <= 90)
            {
                $message = "⚠️ Your blood pressure is slightly high. You need to watch it";
            }
            elseif($value >= 91 && $value <= 100)
            {
                $message = "⚠️ Your blood pressure is really high. You need to talk to your doctor about starting or changing your treatment";
            }

            elseif($value >= 100 && $value <= 110)
            {
                $message = "🚫 Your blood pressure is dangerously high. You need urgent treatment to prevent it from increasing";
            }
            elseif( $value > 110)
            {
                $message = "🚨🚫 Your blood pressure has reached very dangerous levels. This can cause a complication that will lead to significant health problems or death. You need to see a doctor immediately";
            }else{
                $message = "😊🎉 Great your blood pressure is normal";
            }
        }

        if($field_name == "sugar_level_random")
        {

            if($unit == "mmol/l")
            {

                if($value < 4.2 )
                {
                    $message = "⚠️ Your blood sugar is getting low. You may need to eat or adjust your medication to prevent it from getting lower";
                }
            }

            if($unit == "mg/dl")
            {
                
            }
        }




        return response()->json(["message"=>$message]);


    }

}
