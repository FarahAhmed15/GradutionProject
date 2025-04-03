<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProviderAuthController extends Controller
{

public function registerform() {
    $categories = Category::with('services')->get();
    return view("auth.provider_register", compact('categories'));
}

public function register(Request $request) {
    // Validate the request
    $data = $request->validate([
        "name" => "required|string|max:200",
        "email" => "required|email|max:200|unique:service_providers,email",
        "password" => "required|string|min:6|confirmed",
        "experience_years" => "required|string",
        "category_id" => "required|exists:categories,id",
        "services" => "required|array|min:1",
        "services.*" => "exists:services,id",
        "prices" => "required|array|min:1",
        "prices.*" => "numeric|min:50|max:1000",
    ]);

    // Hash password before saving
    $data['password'] = bcrypt($request->password);

    // Create a new service provider
    $provider = ServiceProvider::create([
        "name" => $data['name'],
        "email" => $data['email'],
        "password" => $data['password'],
        "experience_years" => $data['experience_years'],
        "category_id" => $data['category_id'],
    ]);

    // Sync services with prices in the pivot table
    $syncData = [];
    foreach ($request->services as $index => $serviceId) {
        $syncData[$serviceId] = ['price' => $request->prices[$index]];
    }
    $provider->services()->sync($syncData);

    // Redirect after successful registration
    return redirect()->route('provider.login')->with('success', 'Registered successfully. Wait for admin approval.');
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
