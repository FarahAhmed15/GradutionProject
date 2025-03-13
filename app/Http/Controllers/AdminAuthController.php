<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;

class AdminAuthController extends Controller
{

    public function dashboard() {
        return view('admin.service_providers');
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
        $provider->save(); // Save the changes

        return redirect()->back()->with('success', 'Provider approved.');
    }


    public function rejectProvider($id) {
        ServiceProvider::destroy($id);
        return redirect()->back()->with('error', 'Provider rejected.');
    }
}
