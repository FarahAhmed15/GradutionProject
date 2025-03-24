<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function registerform(){
        return view("auth.admin_register");
    }
    public function register(Request $request){
        $data=$request->validate([
            "name"=>"required|string|max:200",
            "email"=>"required|email|max:200|unique:users,email",
            "password"=>"required|string|min:6|confirmed",
        ]);
        $data['password']=bcrypt($request->password);
        Admin::create($data);
        return redirect()->route('admin.loginform');
    }

    public function loginform(){
        return view("auth.admin_login");
    }

    public function login(Request $request){
        $data=$request->validate([
            "email"=>"required|email|max:200",
            "password"=>"required|string|min:6",
        ]);
        
        $valid=Auth::guard('admin')->attempt(["email"=>$request->email,"password"=>$request->password]);
        if($valid){
            session()->flash("success","welcome");
            return redirect()->route("admin.dashboard");

        }else{
            return redirect()->route("admin.loginform")->withErrors(["email" => "Invalid email or password."]);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.loginform');
    }
    public function manageProviders() {
        $providers = ServiceProvider::all();
        return view('admin.service_providers', compact('providers'));
    }

    public function approveProvider($id) {
        $provider = ServiceProvider::find($id);

        if (!$provider) {
            return redirect()->back()->with('error', 'Provider not found.');
        }

        $provider->is_approved = true;
        $provider->save();

        return redirect()->back()->with('success', 'Provider approved.');
    }


    public function rejectProvider($id) {
        ServiceProvider::destroy($id);
        return redirect()->back()->with('error', 'Provider rejected.');
    }
}
