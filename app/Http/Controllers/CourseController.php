<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function load_course($id)
    {
        return view("dashboard.course.course_$id.course_index");
    }
}
