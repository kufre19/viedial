<?php

namespace App\Http\Controllers;

use App\Traits\ProfileTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use UserTrait, ProfileTrait;

    public function index()
    {
        return view("dashboard.profile.index");
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = Auth::user();
    
        // Check if the old password matches
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return back()->with('error', 'The current password does not match.');
        }
    
        // Update the password
        $user->password = Hash::make($request->input('password'));
        $user->save();
    
        // Redirect back with success message
        return back()->with('success', 'Password changed successfully.');
    }
}
