<?php

use App\Http\Controllers\BuildFoodController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoalSettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiskAssessmentController;
use App\Http\Controllers\SecreteAdminController;
use App\Http\Controllers\TeleMonitoringController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\WebsiteContorller;
use App\Models\RiskAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

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

// SECRETE ADMIN PANEL

Route::get("unknown/upload/path",[SecreteAdminController::class,"upload_food_page"]);
Route::post("unknown/upload/path",[SecreteAdminController::class,"upload_food"]);

Route::get("unknown/upload/path/food-cat",[SecreteAdminController::class,"upload_food_cat_page"]);
Route::post("unknown/upload/path/food-cat",[SecreteAdminController::class,"upload_food_category"]);






Route::get('/test-page', function () {
    return view('dashboard.food-building.select-food-to-cook');
});

// Auth Routes
// Route::get("login", [WebsiteContorller::class, "login_page"])->name("login");
// Route::get("signup", [WebsiteContorller::class, "signup_page"])->name("signup");
// Route::post("signup", [WebsiteContorller::class, "signup"]);
// Route::post("login", [WebsiteContorller::class, "login"]);
// Route::get("logout", [WebsiteContorller::class, "logout"]);

Auth::routes(['verify' => true]);


// PROTECTED ROUTES
Route::group(["middleware" => ["auth","verified"]], function () {
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
    Route::get("build-food/start/food-seasons/{season_id}",[BuildFoodController::class,"store_food_build_season"]);
    Route::get("build-food/continue/shopping-list/{shopping_list_id?}/{last_meal_built_id?}",[BuildFoodController::class,"continue_building"])->name("continue-building");
    Route::get("build-food/start/shopping-list/create/food-categories/",[BuildFoodController::class,"select_food_cat"])->name("list.create.food-cat");
    Route::get("build-food/start/shopping-list/create/select-food/{food_cat}",[BuildFoodController::class,"food_selecting_page"])->name("list.create.food-items");
    Route::post("build-food/food-cart/add",[BuildFoodController::class,"add_food_to_cart"]);
    Route::post("build-food/food-cart/remove",[BuildFoodController::class,"remove_food_from_cart"]);
    Route::get("build-food/shopping-list/view",[BuildFoodController::class,"view_cart"]);
    Route::get("build-food/use-shopping-list/{food_to_cook_id}",[BuildFoodController::class,"use_shopping_list"])->name("use-shopping-list");
    Route::get("build-food/build-now/",[BuildFoodController::class,"buildNow"])->name("build-now");
    Route::get("build-food/build-later/",[BuildFoodController::class,"buildLater"])->name("build-later");
    Route::get("build-food/food-to-cook/",[BuildFoodController::class,"select_food_to_cook"])->name("food-to-cook");
    Route::post("build-food/use-shopping-list/enter-serving-number",[BuildFoodController::class,"enter_serving_number"])->name("use-shopping-list.enter-serving-number");
    Route::post("build-food/use-shopping-list/enter-meal-type",[BuildFoodController::class,"saveMealType"])->name("use-shopping-list.enter-meal-type");
    Route::get("build-food/complete-build",[BuildFoodController::class,"completeBuild"]);
    Route::get("build-food/my-shopping-list",[BuildFoodController::class,"showShoppingListHistory"]);


    // GOAL SETTING
    Route::get("set-your-goals",[GoalSettingController::class,"home"]);
    Route::get("set-your-goals/start",[GoalSettingController::class,"set_goal_form"]);
    Route::post("set-your-goals/save",[GoalSettingController::class,"saveGoal"]);
    Route::post("set-your-goals/get-info",[GoalSettingController::class,"getSetGoalInfo"]);



    // TELE MONITORING
    Route::get("tele-monitoring", [TeleMonitoringController::class,"index"])->name("tele-monitoring.index");
    Route::post("tele-monitoring/save", [TeleMonitoringController::class,"save_numbers"])->name("tele-monitoring.save");
    Route::post("tele-monitoring/get-input-notification", [TeleMonitoringController::class,"getInputNotification"]);

    // USER PROFILE
    Route::get("profile", [ProfileController::class,"index"])->name("profile.index");
    Route::post("profile/settings/change-password", [ProfileController::class,"changePassword"])->name("profile.change-password");


    Route::get('/trackers', [TrackerController::class,"index"]);


});


// substandard tenants route
Route::group(["prefix"=>"lions-club"], function(){

    Route::get("/", function(){
        return redirect()->to("lions-club/risk-assessment/start");
    });

    Route::get("risk-assessment/start",[RiskAssessmentController::class,"lions_club_home"]);
    Route::post("risk-assessment/start",[RiskAssessmentController::class,"lions_start"]);
    Route::get("risk-assessment/type-2-diabetes", function () {
        return view('dashboard.risk-assessment.lions.scenario_one');
    });
    Route::post("risk-assessment/type-2-diabetes",[RiskAssessmentController::class,"lions_scenario_one"]);
    Route::get("risk-assessment/result",[RiskAssessmentController::class,"get_user_results"])->name("lions.risk.assessment.result");

    // admin pages
    Route::get("/login", function(){
        return view("dashboard.risk-assessment.lions.login");
    });

    Route::post("/login", function(Request $request){
        $password = $request->input("password");
        if($password == "ASzFE%U*(")
        {
            Session::put("lion_admin",true);
            return redirect()->to("lions-club/admin");
        }else {
            Session::put("lion_admin",false);
            return redirect()->back();

        }
    });

    Route::get("/admin",[RiskAssessmentController::class,"admin_page"]);



});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
