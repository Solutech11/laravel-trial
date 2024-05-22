<?php

namespace App\Http\Controllers\sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sampleController extends Controller
{
    //creating function controller for routes
    public function index (){
        $nameArray=["aisha", "adamu","kaleb"];


        return view('welcome',[
            "names" => $nameArray,
            "boy"=> 44
        ]);
    }

    //about controller
    public function about (){
        $names=["hika","lio"];
        return view('about',compact("names"));
    }

    //info controller
    public function info (){
        return view('info');
    }
}
