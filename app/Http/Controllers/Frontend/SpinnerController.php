<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpinnerController extends Controller
{
     function view(){
        return view('Frontend.spinewheel');
     }
}
