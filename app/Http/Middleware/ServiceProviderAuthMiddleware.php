<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ServiceProviderAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next): Response {
            $user = Auth::guard('service_provider')->user(); // Store the user

            if (!$user || !$user->is_approved) { // Ensure user exists before checking approval
                Auth::guard('service_provider')->logout();
                return redirect()->route('provider.loginform')->with('error', 'Your account is pending approval.');
            }

            return $next($request);
        }
    }
