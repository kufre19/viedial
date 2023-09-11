<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildFoodController extends Controller
{
    public function home()
    {
        return view("dashboard.food-building.index");
    }

    public function building_home_page()
    {
        return view("dashboard.food-building.index");

    }
}
