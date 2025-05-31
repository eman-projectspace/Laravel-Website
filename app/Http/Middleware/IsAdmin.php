<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            // User not logged in, redirect to login page
            return redirect()->route('login');
        }

        if ($user->role !== 'admin') {
            // User logged in but not admin, logout and redirect to login with message
            Auth::logout();
            return redirect()->route('login')->with('error', 'You do not have admin access.');
        }

        return $next($request);
    }
}
