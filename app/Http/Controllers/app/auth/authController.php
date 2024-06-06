<?php

namespace App\Http\Controllers\app\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\TryCatch;

class authController extends Controller
{
    public function loginPage(){
        return view("app.pages.auth.loginPage");
    }

    public function loginFunc(Request $request){
        try{
            $request->validate([
                'email'=> ['required','email'],
                'password'=> ['required','string','min:8', 'max:15'],

            ]);

            return $request->input();
        }catch(ValidationException $e){
            return $e->validator->errors();
        }
    }
    public function registerPAge(){
        return view("app.pages.auth.registerPage");
    }
}
