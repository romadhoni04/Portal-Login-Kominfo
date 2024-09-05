<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->hasRole('superadmin')) {
            return redirect()->route('login')->with('error', 'You do not have access to the superadmin dashboard.');
        }

        return $next($request);
    }
}