<?php

namespace App\Http\Controllers\app\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\error;

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

            return "goes well";
        }catch(ValidationException $e){
            return $e->errors();
        }
    }

    public function registerPAge(){
        return view("app.pages.auth.registerPage");
    }
}
