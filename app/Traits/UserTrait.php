<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait  UserTrait {

    public function getUserBmi()
    {
        $user = Auth::user()->id;
        
    }

}