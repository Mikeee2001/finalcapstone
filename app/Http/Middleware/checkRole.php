<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('signin')->with('error', 'You must be logged in.');
        }

        $user = Auth::user();

        // Check if user role is allowed
        if (!in_array($user->role_as, $roles)) {
            return redirect()->route('signin')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}

