<?php

namespace App\Http\Controllers;

use App\Models\FoodCategories;
use App\Models\FoodItems;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class SecreteAdminController extends Controller
{
    public function upload_food_page()
    {
        $food_cats = FoodCategories::get();
        return view("secreteAdmin.upload_food",compact("food_cats"));
    }

    public function upload_food(Request $request)
    {


      

        // dd( $request->input('food_image'));
        $foodItem = new FoodItems();
        $foodItem->name = $request->input("name");
        $foodItem->food_category_id = $request->input("food_category_id");
        $foodItem->calories = $request->input("calories");
        $foodItem->carbs = $request->input("carbs");
        $foodItem->extras = "more info";

       

        // Handle file upload (if you have an image field)
        if ($request->hasFile('food_image')) {
            $image = $request->file('food_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('view_assets/images/food'), $imageName);
            $foodItem->image = $imageName;
        }

        // Save the model to the database
        $foodItem->save();
        return redirect()->back();

    }
}
