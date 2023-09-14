<?php

namespace App\Traits;

use App\Models\FoodCategories;
use App\Models\FoodItems;
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
        $data = ["season"=>"","shopping_list"=>[]];
        Session::put($this->food_build_session,$data);
    }

    public function updateFoodBuildSession($key,$value)
    {
        $data = Session::get($this->food_build_session);
        $data[$key] = $value;
        Session::put($this->food_build_session,$data);
    }


    public function add_food_to_shopping_list($food_item_id)
    {
        $data = Session::get($this->food_build_session);
        if(!in_array($food_item_id,$data['shopping_list']))
        {
            array_push($data["shopping_list"],$food_item_id);
            // $data["shopping_list"] = $data["shopping_list"];
            Session::put($this->food_build_session,$data);
        }

    }

    public function remove_food_from_shopping_list($food_item_id)
    {
        $data = Session::get($this->food_build_session);
        if(in_array($food_item_id,$data['shopping_list']))
        {
            $to_remove = [$food_item_id];
            $data["shopping_list"] = array_diff($data['shopping_list'],$to_remove);
            Session::put($this->food_build_session,$data);
        }

    }

    public function getShoppingList()
    {
        $data = Session::get($this->food_build_session);
        $shopping_list = $data['shopping_list'];
        return $shopping_list;
    }

    public function getShoppingListItems()
    {
        $list = $this->getShoppingList();
        $food_items = FoodItems::whereIn('id',$list)->get();

        return $food_items;
    }


    
}