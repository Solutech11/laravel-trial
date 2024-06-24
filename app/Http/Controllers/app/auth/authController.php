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


            $user= UserModel::where('email',$request->email)->first();

            if (!$user){return back()->with('error',"User doesnt exist");}

            //pasword
            if ($user->password!=$request->password){
                return back()->with('error',"Invalid Login credential");
            }

            $request->session()->put('user_id',$user->id);

            return redirect('/dashboard');
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

            //check if email exist email
            $UserExist= UserModel::where('email',$request->email)->first();
            if($UserExist){
                return Back()->with('error','User already registered');
            }

            //storing data in the model
            $newuser= new UserModel();
            $newuser->name=$request->name;
            $newuser->email=$request->email;
            $newuser->password=$request->password;
            $saved= $newuser->save();
            
            //if its saved
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
