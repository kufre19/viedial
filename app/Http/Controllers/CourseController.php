<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


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
        $module_info = Config::get("module_info.$course_id.$mod_id");
        $module = Config::get("modules.$mod_id");
        $pdfs = Storage::disk('public')->files("course_assets/course_pdfs/$mod_id");

   
        return view("dashboard.course.module",compact("module_info","course_info","module","pdfs"));
    }


    public function load_sub_module($course_id,$mod_id,$sub_mod_id)
    {
        $course_info = Config::get("courses.$course_id");
        $module_info = Config::get("module_info.$course_id.$mod_id");
        $module = Config::get("modules.$mod_id");
        $sub_module = Config::get("sub_modules.$mod_id.$sub_mod_id");
        $sub_title_name = $this->getSubModTitleName($module['topics'],$sub_mod_id);
        $pdfs = Storage::disk('public')->files("course_assets/course_pdfs/$mod_id/$sub_mod_id");

   
        return view("dashboard.course.sub_module",compact("module_info","course_info","module","pdfs","sub_module","sub_title_name"));
    }

    public function load_extra_module_content($course_id,$mod_id)
    {
        $course_info = Config::get("courses.$course_id");
        $module_info = Config::get("module_info.$course_id.$mod_id");
        $module = Config::get("modules.$mod_id");
    
   
        return view("dashboard.course.extra_content",compact("module_info","course_info","module"));
    }


    public function getSubModTitleName($topics,$sub_mod_id)
    {
        foreach ($topics as $key => $topic) {
            if($topic['id'] == $sub_mod_id);
            return $topic['title'];
        }
    }
}
