<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProviderAuthController extends Controller
{
    public function registerform(){
        return view("auth.provider_register");
    }
    public function register(Request $request){
        $data=$request->validate([
            "name"=>"required|string|max:200",
            "email"=>"required|email|max:200|unique:users,email",
            "password"=>"required|string|min:6|confirmed",
            'experience_years' => 'required|string',
        ]);
        $data['password']=bcrypt($request->password);
        ServiceProvider::create($data);
        return view('auth.provider_login');
    }

    public function loginform(){
        return view("auth.provider_login");
    }

    public function login(Request $request){
        $data=$request->validate([
            "email"=>"required|email|max:200",
            "password"=>"required|string|min:6",
        ]);
        
        $valid=Auth::guard('service_provider')->attempt(["email"=>$request->email,"password"=>$request->password]);
        if($valid){
            session()->flash("success","welcome");
            return view("provider");

        }else{
            return redirect()->route("provider.loginform")->withErrors(["email" => "Invalid email or password."]);
        }
    }

    public function logout(){
        Auth::guard('service_provider')->logout();
        return redirect()->route('provider.loginform');
    }
}
