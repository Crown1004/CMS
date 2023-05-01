<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // user should be admin to access dashboard and should be authenticated
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect('/');
        }

        return $next($request);
    }
}
