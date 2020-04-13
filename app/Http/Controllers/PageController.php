<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //To TOP PAGE
    function top(){
        return view('top');
    }
    //To ABOUT PAGE
    function about(){
        return view('about');
    }

    //To EC PAGE
    function ec(){
        return view('ec');
    }

    //To TEST PAGE 
    function test(){
        $items = ["bag", "clothes", "towel"];
        return view('test', compact('items'));
    }
}
