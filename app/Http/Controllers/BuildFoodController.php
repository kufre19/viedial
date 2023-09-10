<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildFoodController extends Controller
{
    public function index()
    {
        return view("dashboard.food-building.index");
    }
}
