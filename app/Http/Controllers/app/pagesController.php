<?php

namespace App\Http\Controllers\app;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function aboutPage(){
        return view("app.pages.about");
    }
}
7  ;