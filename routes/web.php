<?php

use App\Http\Controllers\WebsiteContorller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard.home');
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
    Route::get('/', function () {
        return view('dashboard.home');
    });
});

