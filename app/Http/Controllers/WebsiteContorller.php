<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteContorller extends Controller
{
    public function login_page()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $email = $request->input("email");
        $password =  $request->input("password");
        $login = Auth::attempt(["email"=>$email,"password"=>$password]);

        if($login)
        {
           return redirect()->intended("/");
        }

        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
       
    }

    public function logout()
    {
        Auth::logout();
       return redirect()->to("login");
    }
}
