<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah user sudah login dan memiliki role admin
        // (Anda bisa menyesuaikan kondisi ini, misal berdasarkan kolom role atau email khusus)
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, tendang keluar kembali ke halaman utama dengan pesan error
        return redirect('/')->with('error', 'Akses ditolak. Anda tidak memiliki izin ke halaman tersebut.');
    }
}