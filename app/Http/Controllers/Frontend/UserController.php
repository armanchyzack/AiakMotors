<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function userLogin(){
        return view('Frontend.auth.login');
    }
     function userRegester(){
        return view('Frontend.auth.regester');
     }

     function userProfile(){
        return view('Frontend.Profile.user_dashboard');
     }
}
