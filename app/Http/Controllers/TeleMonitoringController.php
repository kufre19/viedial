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



        return response()->json(["message"=>$field_name]);


    }

}
