<?php

namespace App\Http\Controllers\app\auth;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
    public function loginPage(){
        return view("app.pages.auth.loginPage");
    }

    public function loginFunc(Request $request){
        try{

            if (Session::get('user_id')){
                return redirect('/dashboard');
            }

            //check user existr
            $user= UserModel::where('email',$request->email)->first();

            //user doest exist throw error
            if (!$user){return back()->with('error',"User doesnt exist");}

            //pasword doesnt match
            if (Hash::check($request->password, $user->password)==false){
                return back()->with('error',"Invalid Login credential");
            }

            //save user id in session
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
          
            if (Session::get('user_id')){
                return redirect('/dashboard');
            }

            //check if email exist email
            $UserExist= UserModel::where('email',$request->email)->first();
            if($UserExist){
                return Back()->with('error','User already registered');
            }

            //storing data in the model
            $newuser= new UserModel();
            $newuser->name=$request->name;
            $newuser->email=$request->email;
            $newuser->password= Hash::make($request->password);
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

    public function logoutFunc(Request $request){
        $request->session()->forget("user_id");

        return redirect('/');
    }
}
