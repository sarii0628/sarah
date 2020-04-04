<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //index
    function index(){
        $sample = "bbb";
        //return view('chopunix')->with('sample',$sample);
        // return view('chopunix')->with([
        //     "sample" => "テスト1",
        //     "sample2" => "テスト2",
        //  ]);
        // $sample1 = "テスト1";
        // $sample2 = "テスト2";
    
        // return view('chopunix',compact('sample1','sample2'));

        $sample = ["テスト1","テスト2", "テスト3"];

        return view('chopunix',compact('sample'));
    }
}
