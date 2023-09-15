<?php

namespace App\Traits;

use App\Models\FoodCategories;
use App\Models\FoodItems;
use App\Models\FoodSeason;
use App\Models\MealBuilt;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait BuildFood {

    public $food_build_session = "buildFoodSession";

    public function fetchHistoryHome()
    {
        $meals = MealBuilt::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->take(3)->get();
        return $meals;
    }

    public function continue_building_btn()
    {
        $last_shopping_list = ShoppingList::latest()->first();
        if($last_shopping_list->used == "no")
        {
            return $last_shopping_list->id;
        }elseif (count($last_shopping_list) < 1) {
            return false;
        }
        return false;
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
        $data = ["season"=>"","shopping_list"=>[],"shopping_list_id"=>"","food_to_cook"=>""];
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

    public function saveShoppingList()
    {
        $data = Session::get($this->food_build_session);
        $shopping_list = $data['shopping_list'];

        $shopping_list_model = new ShoppingList();
        $currentDate = Carbon::now()->toDateString();
        $shopping_list_model->name = "List ". $currentDate ;
        $shopping_list_model->user_id = Auth::user()->id;
        $shopping_list_model->save();

        $shopping_list_items_model = new ShoppingListItem();
        foreach ($shopping_list as $key => $item) {
            $shopping_list_items_model->shopping_list_id = $shopping_list_model->id;
            $shopping_list_items_model->food_item_id = $item;
            $shopping_list_items_model->save();
        }
        return $shopping_list_model->id;
       
    }

    public function loadShoppingList($shopping_list_id)
    {
        $shopping_list = ShoppingList::where("id",$shopping_list_id)->with("ShoppingListItems")->first();
        $this->updateFoodBuildSession("shopping_list_id",$shopping_list_id);

        $this->updateFoodBuildSession("shopping_list",[]);
        foreach ($shopping_list->ShoppingListItems as $key => $shopping_items) {
            $this->add_food_to_shopping_list($shopping_items->food_item_id);
        }
    }


    
}