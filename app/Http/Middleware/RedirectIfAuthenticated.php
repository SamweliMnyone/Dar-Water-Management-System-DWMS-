<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // Redirect based on role
                if ($user->role === 'administrator') {
                    return redirect()->route('index');
                } elseif ($user->role === 'technician') {
                    return redirect()->route('techDashboard');
                } elseif ($user->role === 'engineer') {
                    return redirect()->route('engineerDashboard');
                }
            }
        }

        return $next($request);
    }
}
