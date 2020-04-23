<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class socialcontroller extends Controller
{
public function redirect($service)
    {
        return Socialite::driver($service)->redirect();

    }

    public function callback($service)
    {
               $user = Socialite::driver($service)->stateless()->user() ;
             return response() -> json($user);
              
    }
}
