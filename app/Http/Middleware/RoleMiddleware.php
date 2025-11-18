<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Jika user tidak authenticated, redirect ke login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Cek apakah role user sesuai dengan role yang diizinkan
        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        // Jika role tidak sesuai, redirect berdasarkan role user
        if (auth()->user()->role === 'seniman') {
            return redirect('/dashboard-seniman');
        } else if (auth()->user()->role === 'admin') {
            return redirect('/dashboard-admin');
        }

        return redirect('/login');
    }
}
