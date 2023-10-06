<?php

namespace App\Traits;

use App\Models\FoodCategories;
use App\Models\FoodItems;
use App\Models\FoodSeason;
use App\Models\FoodToBeCooked;
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
        $meals = MealBuilt::where('user_id',Auth::user()->id)->where('status','complete')->orderBy('created_at', 'desc')->take(3)->get();
        return $meals;
    }

    public function continue_building_btn()
    {
        $last_shopping_list = ShoppingList::latest()->first();
        $meal_built = MealBuilt::latest()->first();
        // dd($last_shopping_list);
        if($last_shopping_list && $meal_built)
        {
            if($last_shopping_list->used == "no" && $meal_built->status == 'pending')
            {
                return ["last_shopping_list_id"=>$last_shopping_list->id,"last_meal_built_id"=>$meal_built->id];

            }
        }
        // elseif (count($last_shopping_list) < 1) {
        //     return false;
        // }
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
        $data = [
        "season"=>"","shopping_list"=>[],"shopping_list_id"=>"",
        "food_to_cook"=>"","meal_type"=>"","meal_built_id"=>"",
        "meal_calories"=>"","servings"=>[]
        ];
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

    public function getFoodItem($food_item_id)
    {
        $food_item = FoodItems::where('id',$food_item_id)->first();
        return $food_item;

    }

    public function saveShoppingList()
    {
        $data = Session::get($this->food_build_session);
        $shopping_list = $data['shopping_list'];
        // dd($shopping_list);

        $shopping_list_model = new ShoppingList();
        $currentDate = Carbon::now()->toDateString();
        $shopping_list_model->name = "List ". $currentDate ;
        $shopping_list_model->user_id = Auth::user()->id;
        $shopping_list_model->save();

        foreach ($shopping_list as $key => $item) {
            $shopping_list_items_model = new ShoppingListItem();
            $shopping_list_items_model->shopping_list_id = $shopping_list_model->id;
            $shopping_list_items_model->food_item_id = $item;
            $shopping_list_items_model->save();
        }
        return $shopping_list_model->id;
       
    }

    /**
     * Loads shopping list items by id given into session
     * @param int $shopping_list_id
    
    */

    public function loadShoppingList($shopping_list_id)
    {
        $shopping_list = ShoppingList::where("id",$shopping_list_id)->with("ShoppingListItems")->first();
        $this->updateFoodBuildSession("shopping_list_id",$shopping_list_id);

        $this->updateFoodBuildSession("shopping_list",[]);
        foreach ($shopping_list->ShoppingListItems as $key => $shopping_items) {
            
            $this->add_food_to_shopping_list($shopping_items->food_item_id);
            $this->updateMealServings($shopping_items->food_item_id,1);
        }
           
       
    }


    public function saveBuild()
    {

        $build_session = Session::get($this->food_build_session);
        $food_cooked = FoodToBeCooked::find($build_session['food_to_cook']);
        $meal_built_id = $build_session['meal_built_id'];

        if($meal_built_id != "")
        {
            MealBuilt::where("id",$meal_built_id)->update([
                "meal_type"=>$build_session['meal_type'],
                "status"=>"complete"
            ]);
        }else {
            $build_session = Session::get($this->food_build_session);
            $food_cooked = FoodToBeCooked::find($build_session['food_to_cook']);
            $meal_built_model = new MealBuilt();
            $meal_built_model->user_id = Auth::user()->id;
            $meal_built_model->name = $food_cooked->name;
            $meal_built_model->food_to_be_cooked_id = $build_session['food_to_cook'];
            $meal_built_model->shopping_list_id = $build_session['shopping_list_id'];
            $meal_built_model->meal_type =$build_session['meal_type'];
            $meal_built_model->status ="complete";
            
            $meal_built_model->save();
        }
       
        ShoppingList::where("id",$build_session['shopping_list_id'])->update([
            'used'=>"yes"
        ]);
    }

    public function saveBuildForLater()
    {
        $build_session = Session::get($this->food_build_session);
        $food_cooked = FoodToBeCooked::find($build_session['food_to_cook']);
        $meal_built_model = new MealBuilt();
        $meal_built_model->user_id = Auth::user()->id;
        $meal_built_model->name = $food_cooked->name;
        $meal_built_model->food_to_be_cooked_id = $build_session['food_to_cook'];
        $meal_built_model->shopping_list_id = $build_session['shopping_list_id'];
        $meal_built_model->status ="pending";
        $meal_built_model->save();
    }

    public function updateMealServings($food_item_id,$num_of_servings)
    {

        $build_session = Session::get($this->food_build_session);
        $servings = $build_session["servings"] ;
        $servings[$food_item_id] = $num_of_servings;
        $this->updateFoodBuildSession("servings",$servings);

    }

    /**
     * update the whole meal calories count by mulyiplying the food item calories by number of servings of
     * the food item. using their IDs to identify them
     * @returns void 
     */
    public function updateMealCaloriesCount()
    {
        $meal_calories = 0;
        $build_session = Session::get($this->food_build_session);
        $servings = $build_session["servings"] ;
        $food_items = $this->getShoppingListItems();

        foreach($food_items as $key => $value)
        {
           $serving_num = $servings[$value->id];
           $food_item_calories = $value->calories;

           $food_total_calories = $food_item_calories * $serving_num;
           $meal_calories += $food_total_calories;
            
        }

        $this->updateFoodBuildSession("meal_calories",$meal_calories);


    }



    
}