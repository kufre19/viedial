<?php

use App\Http\Controllers\BuildFoodController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiskAssessmentController;
use App\Http\Controllers\WebsiteContorller;
use App\Models\RiskAssessment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/link-storage', function () {
    $exitCode = Artisan::call('storage:link');
    return 'Storage link has been created.';
});




Route::get('/test-page', function () {
    return view('dashboard.food-building.select-food-to-cook');
});

// Auth Routes
Route::get("login", [WebsiteContorller::class, "login_page"])->name("login");
Route::get("signup", [WebsiteContorller::class, "signup_page"])->name("signup");
Route::post("signup", [WebsiteContorller::class, "signup"]);
Route::post("login", [WebsiteContorller::class, "login"]);
Route::get("logout", [WebsiteContorller::class, "logout"]);


// PROTECTED ROUTES
Route::group(["middleware" => "auth"], function () {
    // DASHBOARD
    Route::get('/', [DashboardController::class, "dashboard"]);
    Route::get("courses/{id}", [CourseController::class, "load_course"]);
    Route::get("course/module/{course_id}/{mod_id}", [CourseController::class, "load_module"]);
    Route::get("course/module/extra-content/{course_id}/{mod_id}", [CourseController::class, "load_extra_module_content"])->name("load.extra-content");
    Route::get("course/module/sub-module/{course_id}/{mod_id}/{sub_mod_id}", [CourseController::class, "load_sub_module"])->name("load.sub.module");

    Route::get('/download/worksheet/{module}/{file}', function ($module, $file) {
        $file = urldecode($file);
        return Storage::disk('public')->download("course_assets/course_pdfs/$module/" . $file);
    })->where('file', '.*')->name("download.worksheet");


    // RISK ASSESSTMENT
    Route::group(['prefix' => "risk-assessment"], function () {
        Route::get("", function () {
            return view('dashboard.risk-assessment.index');
        })->name("risk.assessment.start");

        Route::get("/type-2-diabetes", function () {
            return view('dashboard.risk-assessment.scenario_one');
        });
        Route::get("/cvd", function () {
            return view('dashboard.risk-assessment.scenario_two');
        });
        
        Route::get("/diabetes-cvd", function () {
            return view('dashboard.risk-assessment.scenario_three');
        });
        Route::post("start",[RiskAssessmentController::class,"start"]);
        Route::post("type-2-diabetes",[RiskAssessmentController::class,"scenario_one"]);
        Route::post("cvd",[RiskAssessmentController::class,"scenario_two"]);
        Route::post("diabetes-cvd",[RiskAssessmentController::class,"scenario_three"]);

        Route::get("/result",[RiskAssessmentController::class,"get_user_results"])->name("risk.assessment.result");


    });
    // RISK ASSESSMENT ENDS

    // BUILDING FOOD
    Route::get("build-food",[BuildFoodController::class,"home"]);
    Route::get("build-food/start/{season}",[BuildFoodController::class,"building_home_page"]);
    Route::get("build-food/start/select-food/{season}/{food_cat}",[BuildFoodController::class,"food_selecting_page"]);
    Route::post("build-food/food-cart/add",[BuildFoodController::class,"add_food_to_cart"]);
    Route::post("build-food/food-cart/remove",[BuildFoodController::class,"remove_food_from_cart"]);
    Route::get("build-food/food-cart/view",[BuildFoodController::class,"view_cart"]);
    Route::get("build-food/use-shopping-list/{food_to_cook}",[BuildFoodController::class,"use_shopping_list"]);
    Route::get("build-food/food-to-cook/",[BuildFoodController::class,"select_food_to_cook"]);





});
