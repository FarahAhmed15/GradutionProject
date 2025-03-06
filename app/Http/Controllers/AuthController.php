<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerform(){
        return view("auth.register");
    }
    public function register(Request $request){
        $data=$request->validate([
            "name"=>"required|string|max:200",
            "email"=>"required|email|max:200",
            "password"=>"required|string|min:6|confirmed",
        ]);
        $data['password']=bcrypt($request->password);
        User::create($data);
        return view('auth.login');
    }

    public function loginform(){
        return view("auth.login");
    }

    public function login(Request $request){
        $data=$request->validate([
            "email"=>"required|email|max:200",
            "password"=>"required|string|min:6",
        ]);
        
        $valid=Auth::attempt(["email"=>$request->email,"password"=>$request->password]);
        if($valid){
            session()->flash("success","welcome");
            return view("success");

        }else{
            return redirect()->route("login")->withErrors(["email" => "Invalid email or password."]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
