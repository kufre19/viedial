<?php

namespace App\Http\Controllers;

use App\Models\FoodCategories;
use App\Models\FoodItems;
use App\Models\FoodSeason;
use App\Traits\BuildFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuildFoodController extends Controller
{
    use BuildFood;

    public function home()
    {
        $meals = $this->fetchHistoryHome();
        $seasons = $this->getSeasons();
        return view("dashboard.food-building.index",compact("meals","seasons"));
    }

    public function store_food_build_season($season_id)
    {
        //  code to store selected session after validating and getting food cats by the season id
        $this->setFoodBuildSession();
        $season = FoodSeason::find($season_id);

        if(!$season)
        {
            // return with error of something went wrong
        }else{
           $this->updateFoodBuildSession("season",$season_id);
        }
        return redirect()->to(route("list.food-cat"));
    }

    public function select_food_cat()
    {

        $food_categories = FoodCategories::get();
        return view("dashboard.food-building.select-food-cat",compact("food_categories"));

    }

    public function food_selecting_page($food_cat)
    {
        // dd(Session::get($this->food_build_session));
        $food_items = FoodItems::where("food_category_id",$food_cat)->get();
        $food_category = FoodCategories::find($food_cat);
        return view("dashboard.food-building.select-food",compact("food_items","food_category"));

    }

    public function add_food_to_cart(Request $request)
    {
        $food_item_id = $request->input("foodId");
        $this->add_food_to_shopping_list($food_item_id);
        return response()->json(["data"=>"Added to shopping list","alert_type"=>"success"]);
    }

    public function remove_food_from_cart(Request $request)
    {
        $food_item_id = $request->input("foodId");
        $this->remove_food_from_shopping_list($food_item_id);
        return response()->json(["data"=>"Removed from shopping list","alert_type"=>"danger"]);
    }

    public function view_cart()
    {
        $shopping_list = $this->getShoppingList();
        if(count($shopping_list) < 1)
        {
            // return with warning alert that the list is empty and user should add fodd items
            return redirect()->back()->with("warning","Your shopping list is empty please go ahead and add to it!");
        }
        $shopping_list_items = $this->getShoppingListItems();
        return view("dashboard.food-building.cart",compact("shopping_list_items"));

    }

    public function buildNow()
    {
        $this->saveShoppingList();
    }

    public function buildLater()
    {
        $this->saveShoppingList();
        $alert_txt = "Wonderful 🎉 You shopping List has been saved you can use it later to build your meals🎉";
        // this should be change to redirect to a shopping list history page 
        return redirect()->to("build-food")->with("success",$alert_txt);

    }

    public function use_shopping_list()
    {
        return view("dashboard.food-building.use-shopping-list");

    }

    public function select_food_to_cook()
    {
        return view('dashboard.food-building.select-food-to-cook');

    }
}
