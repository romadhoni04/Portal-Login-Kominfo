<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Jika user tidak memiliki role yang diperlukan
        if (!$request->user() || !$request->user()->hasRole($role)) {
            // Arahkan ke halaman lain, jangan ke route yang memeriksa middleware ini
            return redirect()->route('home')->with('error', 'You do not have the required role.');
        }

        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
