<?php

namespace App\Traits;

use App\Models\FoodCategories;
use App\Models\FoodSeason;
use App\Models\MealBuilt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait BuildFood {

    public $food_build_session = "buildFoodSession";

    public function fetchHistoryHome()
    {
        $meals = MealBuilt::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->take(3)->get();
        return $meals;
    }

    public function getSeasons()
    {
        return FoodSeason::get();
    }

    public function getFoodCats()
    {
        return FoodCategories::get();
    }

    public function setFoodBuildSession()
    {
        $data = ["season"=>"","shopping_list"=>""];
        Session::put($this->food_build_session,$data);
    }

    public function updateFoodBuildSession($key,$data)
    {
        $data = Session::get($this->food_build_session);
        $data[$key] = $data;
        Session::put($this->food_build_session,$data);
    }


    public func


    
}