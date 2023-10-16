<?php

namespace App\Http\Controllers;

use App\Models\FoodCategories;
use App\Models\FoodItems;
use App\Models\FoodSeason;
use App\Models\FoodToBeCooked;
use App\Models\ShoppingList;
use App\Traits\BuildFood;
use App\Traits\TeleMonitoringTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BuildFoodController extends Controller
{
    use BuildFood, TeleMonitoringTrait;

    public function home()
    {
        $meals = $this->fetchHistoryHome();
        $seasons = $this->getSeasons();
        $continue_building = $this->continue_building_btn();
        
        if(session()->get("set-goal") != false)
        {
            $calories_requirment = $this->getUserCaloriesReqs();
        }else {
             $calories_requirment ="";
        }
        
        // dd($calories_requirment);
        return view("dashboard.food-building.index",compact("meals","seasons","continue_building","calories_requirment"));
    }

    public function continue_building($shopping_list_id="",$last_meal_built_id="")
    {

        if($shopping_list_id != "" )
        {
            // this loads shopping list into session
            // and update the calories count for the whole meal
            $this->loadShoppingList($shopping_list_id);
            $this->updateMealCaloriesCount();

        }
        if($last_meal_built_id !="")
        {
            $this->updateFoodBuildSession("meal_built_id",$last_meal_built_id);
        }
       
       
        return redirect()->to(route("use-shopping-list",["food_to_cook_id"=>session()->get($this->food_build_session)['food_to_cook']])) ;

    }

    public function store_food_build_season($season_id)
    {
        //  code to store selected session after validating and getting food cats by the season id
        $this->setFoodBuildSession();
        $season = FoodSeason::find($season_id);

        if(!$season)
        {
            // return with error of something went wrong
            return redirect()->back();
        }else{
           $this->updateFoodBuildSession("season",$season_id);
        }
        return redirect()->to(route("food-to-cook"));
    }

    public function select_food_cat(Request $request)
    {

        // YOU SHOULD CHECK FOR THIS ID LATER ON...
        if($request->has("food_to_cook"))
        {
           $this->updateFoodBuildSession("food_to_cook",$request->input("food_to_cook"));
        }
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
        $shopping_list_id =  $this->saveShoppingList();
        return redirect()->to(route('continue-building',['shopping_list_id'=>$shopping_list_id]));


    }

    public function buildLater()
    {
        $shopping_list_id = $this->saveShoppingList();
        $this->updateFoodBuildSession("shopping_list_id",$shopping_list_id);
        $this->saveBuildForLater();

        $alert_txt = "Wonderful 🍾 You shopping List has been saved you can use it later to build your meals🎉";
        // this should be change to redirect to a shopping list history page 
        return redirect()->to("build-food")->with("shopping-list-saved",$alert_txt);

    }

    public function use_shopping_list($food_to_cook_id)
    {
        $this->updateFoodBuildSession("food_to_cook",$food_to_cook_id);
        $shopping_list = $this->getShoppingList();
        if(count($shopping_list) < 1)
        {
            // return with warning alert that the list is empty and user should add fodd items
            return redirect()->back()->with("warning","Your shopping list is empty please go ahead and add to it!");
        }
        $shopping_list_items = $this->getShoppingListItems();

        return view("dashboard.food-building.use-shopping-list",compact("shopping_list_items"));
    }

    public function enter_serving_number(Request $request)
    {
        $num_of_serving = $request->input("num_of_serving");
        $food_name = $request->input("food_name");
        $food_item_id = $request->input("food_id");

        $this->updateMealServings($food_item_id,$num_of_serving);
        $this->updateMealCaloriesCount();

        $food_item_calories = $this->getFoodItem($food_item_id)->calories * $num_of_serving;

        $meal_calories =number_format(Session::get($this->food_build_session)['meal_nutrients']['calories'],2);
        $meal_nutrients = Session::get($this->food_build_session)['meal_nutrients'];
        return response()->json([
            "data"=>"added $num_of_serving servings to $food_name",
            "meal_calories"=>$meal_calories,
            "food_item_calories"=>$food_item_calories,
            "food_item_id"=>$food_item_id,
            "meal_nutrients"=>$meal_nutrients
        ]);
    }

    public function saveMealType(Request $request)
    {
        $mealType = $request->input("mealType");
        $this->updateFoodBuildSession("meal_type",$mealType);
        return response()->json(["data"=>"ok",200]);
    }

    public function completeBuild()
    {
        $this->saveBuild();
        $alert_txt = "Wonderful 🤩, You've taken the right step to healthy eating";
        return redirect()->to("build-food")->with("meal-built",$alert_txt);
        
    }

    public function select_food_to_cook()
    {
        $this->setFoodBuildSession();
        $food_to_be_cooked = FoodToBeCooked::get();
        return view('dashboard.food-building.select-food-to-cook',compact("food_to_be_cooked"));
        // return redirect()->to("build-food")->with("shopping-list-saved",$alert_txt);

    }

    public function showShoppingListHistory()
    {
        $shopping_list = ShoppingList::where("user_id",Auth::user()->id)->latest()->paginate(10);
        return view("dashboard.food-building.shopping-list-history",compact("shopping_list"));
    }
}
