<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
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


Route::get('/module', function () {
    return view('dashboard.course.module');
});

Route::get('/course-page', function () {
    return view('dashboard.course.course_index');
});

Route::get('/profile', function () {
    return view('dashboard.profile');
});

// Auth Routes
Route::get("login",[WebsiteContorller::class,"login_page"])->name("login");
Route::post("login",[WebsiteContorller::class,"login"]);
Route::get("logout",[WebsiteContorller::class,"logout"]);


// PROTECTED ROUTES
Route::group(["middleware"=>"auth"], function()
{
    // DASHBOARD
    Route::get('/', [DashboardController::class,"dashboard"]);
    Route::get("courses/{id}",[CourseController::class,"load_course"]);
    Route::get("course/module/{course_id}/{mod_id}",[CourseController::class,"load_module"]);
    Route::get("course/module/sub-module/{course_id}/{mod_id}/{sub_mod_id}",[CourseController::class,"load_sub_module"])->name("load.sub.module");

    Route::get('/download/worksheet/{module}/{file}', function ($sub_mod,$module,$file) {
        $file = urldecode($file);
        return Storage::disk('public')->download("course_assets/course_pdfs/$module/$sub_mod/" . $file);
    })->where('file', '.*')->name("download.worksheet");

});

