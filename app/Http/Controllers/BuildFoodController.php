<?php

namespace App\Http\Controllers;

use App\Traits\BuildFood;
use Illuminate\Http\Request;

class BuildFoodController extends Controller
{
    use BuildFood;

    public function home()
    {
        return view("dashboard.food-building.index");
    }

    public function building_home_page()
    {
        return view("dashboard.food-building.select-food-cat");

    }

    public function food_selecting_page()
    {
        return view("dashboard.food-building.select-food");

    }

    public function add_food_to_cart(Request $request)
    {
        return response()->json(["data"=>"Added to cart","alert_type"=>"success"]);
    }

    public function remove_food_from_cart()
    {
        return response()->json(["data"=>"Removed from cart","alert_type"=>"danger"]);

    }

    public function view_cart()
    {
        return view("dashboard.food-building.cart");

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
