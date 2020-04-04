<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //index
    function index(){
        return view('chopunix');
    }
}
