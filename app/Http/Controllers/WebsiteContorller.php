<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UserTrait;
use Carbon\Traits\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WebsiteContorller extends Controller
{
    use UserTrait;
    public function login_page()
    {
        if(Auth::check())
        {
            return redirect()->back();
        }
        return view("login");
    }

    public function login(Request $request)
    {
        $email = $request->input("email");
        $password =  $request->input("password");
        $login = Auth::attempt(["email"=>$email,"password"=>$password]);

        if($login)
        {
           $this->userHasBmi();
           $this->userHasGoalSet();
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


    public function signup_page()
    {
        return view("register");

    }

    public function signup(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // 'whatsapp_number' => 'string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = new User([
            'name' => $request->name,
            // 'whatsapp_number' => $request->whatsapp_number, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        $user->save();
    
        // Log the user in
        auth()->login($user);
    
        // Redirect them to a welcome or dashboard page
        return redirect()->to('/')->with('status', 'Registration successful. Welcome!');
    

    }
}
