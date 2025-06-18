<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Periksa apakah pengguna sudah login DAN memiliki peran yang sesuai
        if (!Auth::check() || !$request->user()->hasRole($role)) {
            // Jika tidak, tolak akses
            abort(403, 'AKSES DITOLAK: Anda tidak memiliki peran yang dibutuhkan.');
        }

        return $next($request);
    }
}
