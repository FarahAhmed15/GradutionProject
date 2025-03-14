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
        return view('auth.provider_login')->with('success', 'Registered successfully. Wait for admin approval.');
    }


    public function loginform(){
        return view("auth.provider_login");
    }

    public function login(Request $request) {
        $data = $request->validate([
            "email" => "required|email|max:200",
            "password" => "required|string|min:6",
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('service_provider')->attempt($credentials)) { 
            $user = Auth::guard('service_provider')->user(); 

            if (!$user->is_approved) {
                Auth::guard('service_provider')->logout();
                return redirect()->route('provider.loginform')->with('error', 'Account not approved yet.');
            }

            return redirect()->route('provider.dashboard'); 
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }


    public function dashboard() {
        return view('service_provider.dashboard');
    }
    public function logout(){
        Auth::guard('service_provider')->logout();
        return redirect()->route('provider.loginform');
    }
}
