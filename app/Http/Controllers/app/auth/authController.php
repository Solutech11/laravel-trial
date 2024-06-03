<?php

namespace App\Http\Controllers\app\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function loginPage(){
        return view("app.pages.auth.loginPage");
    }

    public function registerPAge(){
        return view("app.pages.auth.registerPage");
    }
}
