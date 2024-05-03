<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Redirect the user to the login page
            return redirect()->route('register.show');
        }

        return $next($request);
    }
}
