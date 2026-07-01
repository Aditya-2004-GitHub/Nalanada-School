<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Ensures the user is authenticated AND has the 'admin' role.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'email' => 'Please log in to access this page.',
            ]);
        }

        // Check if user has admin role
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('notAuthorized');
        }

        return $next($request);
    }
}
