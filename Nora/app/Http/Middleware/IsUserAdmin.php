<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsUserAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Overíme, či je používateľ prihlásený cez Laravel Auth
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('/');
        }

        return $next($request);
    }
}