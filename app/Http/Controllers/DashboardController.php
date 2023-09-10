<?php

namespace App\Http\Controllers;

use App\Models\Cousrses;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $subscription_model = new Subscription();
        $subscriptions = $subscription_model->where("user_id",Auth::user()->id)->get();

        return view("dashboard.home",compact("subscriptions"));
        
    }
}
