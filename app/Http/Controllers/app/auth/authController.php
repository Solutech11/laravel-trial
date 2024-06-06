<?php

namespace App\Http\Controllers\app\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class authController extends Controller
{
    public function loginPage(){
        return view("app.pages.auth.loginPage");
    }

    public function loginFunc(Request $request){
        try{

            $request->validate([
                'email'=>['required', 'email'],
                'password'=>['required', 'string', 'max:15', 'min:8'],
            ]);

            return '<h1>Success registered</h1>';
        }catch(ValidationException $e){

            //Error page
            return back()->withErrors($e->validator->errors());
            //return view("app.pages.auth.loginPage",['errors'=>$e->errors()]);
        }
    }

    public function registerPage(){
        return view("app.pages.auth.registerPage");
    }

    public function registerFunc(Request $request){
        try{
            $request->validate([
                'name'=> ['required', 'string','max:30','min:5'],
                'email'=>['required', 'email'],
                'password'=>['required', 'string', 'max:15', 'min:8'],
            ]);

            return '<h1>Success registered</h1>';
        }catch(ValidationException $e){
            return back()->withErrors($e->validator->errors());
            // return view("app.pages.auth.registerPage",["errors"=>$e->errors()]);
        }
    }
}
