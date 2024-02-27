<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

class PageController extends Controller
{
    public function home (){
        return view('home');
    }

   

}
