<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function registerform(){
        return view("auth.user_register");
    }
    public function register(Request $request){
        $data=$request->validate([
            "name"=>"required|string|max:200",
            "email"=>"required|email|max:200|unique:users,email",
            "password"=>"required|string|min:6|confirmed",
        ]);
        $data['password']=bcrypt($request->password);
        User::create($data);
        return redirect()->route('user.loginform');
    }

    public function loginform(){
        return view("auth.user_login");
    }

    public function login(Request $request){
        $data=$request->validate([
            "email"=>"required|email|max:200",
            "password"=>"required|string|min:6",
        ]);
        
        $valid=Auth::guard('user')->attempt(["email"=>$request->email,"password"=>$request->password]);
        if($valid){
            session()->flash("success","welcome");
            return redirect()->route("user.dashboard");

        }else{
            return redirect()->route("user.loginform")->withErrors(["email" => "Invalid email or password."]);
        }
    }

    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->route('user.loginform');
    }
}
