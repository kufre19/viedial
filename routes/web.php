<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiskAssessmentController;
use App\Http\Controllers\WebsiteContorller;
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
    return view('dashboard.risk-assessment.results');
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
        Route::post("start",[RiskAssessmentController::class,"start"]);
        Route::post("type-2-diabetes",[RiskAssessmentController::class,"scenario_one"]);

    });
});
