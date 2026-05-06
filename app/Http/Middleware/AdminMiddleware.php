<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dan rolenya admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Kalau bukan admin, redirect ke homepage dengan pesan error
        return redirect('/')
                    ->with('error', 'Anda tidak memiliki akses ke halaman admin. Hanya Admin yang boleh masuk.');
    }
}