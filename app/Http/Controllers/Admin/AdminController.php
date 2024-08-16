<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');

    }

    function loginPage()
    {
        return view('admin.login');
    }

    public function users()
    {
        $title = "Users";
        $users = User::where('is_admin', false)->paginate(10); 
        return view('admin.users', compact('users','title'));
    }


}
