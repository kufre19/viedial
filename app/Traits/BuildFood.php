<?php

namespace App\Traits;

use App\Models\MealBuilt;
use Illuminate\Support\Facades\Auth;

trait BuildFood {


    public function fetchHistoryHome()
    {
        $meals = MealBuilt::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->take(3)->get();
        return $meals;
    }


    
}