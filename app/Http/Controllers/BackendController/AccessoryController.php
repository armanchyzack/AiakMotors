<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    function view(){
        //
    }

    function allAccessory(){
        return view('Backend.Accessory.all_accessory');
    }
}
