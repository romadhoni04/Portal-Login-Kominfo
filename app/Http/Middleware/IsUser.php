<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->hasRole('user')) {
            return redirect()->route('login')->with('error', 'You do not have access to the user dashboard.');
        }

        return $next($request);
    }
}
