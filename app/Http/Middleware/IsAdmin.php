<?php


 namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Make sure user is logged in first
        $user = auth()->user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}

