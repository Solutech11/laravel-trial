<?php

namespace App\Http\Controllers\app\auth;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
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

            return '<h1>Success Loggedin</h1>';
        }catch(ValidationException $e){
            return back()->withErrors($e->validator->errors());
            // return view("app.pages.auth.registerPage",["errors"=>$e->errors()]);
        }
    }
    public function registerPAge(){
        return view("app.pages.auth.registerPage");
    }

    public function registerFunc(Request $request){
        try{
            $request->validate([
                'name'=> ['required', 'string','max:30','min:5'],
                'email'=>['required', 'email'],
                'password'=>['required', 'string', 'max:15', 'min:8'],
            ]);

            //check unique email
            $UserCheck= UserModel::where('email',$request->email)->get();
            if($UserCheck){
                return Back()->with('user',`User already registered`);
            }

            //storing data in the model
            $newuser= new UserModel();
            $newuser->name=$request->name;
            $newuser->email=$request->email;
            $newuser->password=$request->password;
            $saved= $newuser->save();
            
            if($saved){
                return redirect('/')->with('success','Registration Successfully');
            }
            
            return Back()->with('error','Unable to Register User');
        }catch(ValidationException $e){
            return back()->withErrors($e->validator->errors());
            // return view("app.pages.auth.registerPage",["errors"=>$e->errors()]);
        }
    }
}
