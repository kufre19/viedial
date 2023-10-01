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
                }elseif ($value < 3.5) {
                   $message = "🚨🚫 Your blood sugar is getting dangerously low. you will need to take a glass of juice or another sugary drink and adjust your medication to prevent it from getting low";
                }else{
                    $message = "😊🎉 Your blood sugar is within normal range. Keep it up";
                }
            }

            if($unit == "mg/dl")
            {
                
                if($value < 75.6 )
                {
                    $message = "⚠️ Your blood sugar is getting low. You may need to eat or adjust your medication to prevent it from getting lower";
                }elseif ($value < 63) {
                    $message = "🚨🚫 Your blood sugar is getting dangerously low. you will need to take a glass of juice or another sugary drink and adjust your medication to prevent it from getting low";
                 }
            }
        }

        if($field_name == "sugar_level_bf")
        {

            if($unit == "mmol/l")
            {

                if($value >= 4.2 && $value <= 5.6  )
                {
                    $message = "😊🎉 Your blood sugar is within normal range. Keep it up";
                    // $message = "⚠️ Your blood sugar is getting low. You may need to eat or adjust your medication to prevent it from getting lower";
                }elseif ($value >= 5.7 && $value <= 6.9 ) {
                   $message = "🚫 Your blood sugar is slightly high and we will work with you to keep it at normal level";
                }elseif($value > 6.9){
                    $message = "🚨🚫 Your blood sugar is really high and we suggest starting or changing your medications and also make needed changes in your diet and physical activity. We are happy to keep working with you until we get to a normal level";
                }
            }

            if($unit == "mg/dl")
            {
                
                if($value >= 75.6 && $value <= 100.8  )
                {
                    $message = "😊🎉 Your blood sugar is within normal range. Keep it up";
                    // $message = "⚠️ Your blood sugar is getting low. You may need to eat or adjust your medication to prevent it from getting lower";
                }elseif ($value >= 102.6 && $value <= 124.2 ) {
                   $message = "🚫 Your blood sugar is slightly high and we will work with you to keep it at normal level";
                }elseif($value > 124.2){
                    $message = "🚨🚫 Your blood sugar is really high and we suggest starting or changing your medications and also make needed changes in your diet and physical activity. We are happy to keep working with you until we get to a normal level";
                }
            }
        }

        if($field_name == "sugar_level_afm")
        {

            if($unit == "mmol/l")
            {

                if($value >= 4.2 && $value <= 7.8  )
                {
                    $message = "😊🎉 You had no blood sugar spike after the meal. Keep it up";
                    // $message = "⚠️ Your blood sugar is getting low. You may need to eat or adjust your medication to prevent it from getting lower";
                }elseif ($value >= 7.9 && $value <= 8.5 ) {
                   $message = "🚫 There is a slight spike after the meal. We will work with you to avoid this from happening all the time";
                }elseif($value > 8.5){
                    $message = "🚨🚫 There is a high spike after the meal. We will work with you to prevent this from happening again";
                }
            }

            if($unit == "mg/dl")
            {
                
                if($value >= 75.6 && $value <= 140.4 )
                {
                    $message = "😊🎉 You had no blood sugar spike after the meal. Keep it up";
                    // $message = "⚠️ Your blood sugar is getting low. You may need to eat or adjust your medication to prevent it from getting lower";
                }elseif ($value >= 142.2 && $value <= 153 ) {
                    $message = "🚫 There is a slight spike after the meal. We will work with you to avoid this from happening all the time";
                }elseif($value > 153){
                    $message = "🚨🚫 There is a high spike after the meal. We will work with you to prevent this from happening again";
                }
            }
        }




        return response()->json(["message"=>$message]);


    }

}
