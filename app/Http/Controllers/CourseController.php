<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CourseController extends Controller
{
    public function load_course($id)
    {
        $course_info = Config::get("courses.$id");
        $module_info = Config::get("module_info.$id");
   
        return view("dashboard.course.course_index",compact("module_info","course_info"));
    }

    public function load_module($course_id,$mod_id)
    {
        $course_info = Config::get("courses.$course_id");
        $module_info = Config::get("module_info.$course_id");
        $module = Config::get("modules.$mod_id");

   
        return view("dashboard.course.module",compact("module_info","course_info","module"));
    }
}
