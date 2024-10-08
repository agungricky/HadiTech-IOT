<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (!Session::has('user')) {
            // Jika belum login, redirect ke halaman login
            return redirect('/')->withErrors(['msg' => 'Anda harus login terlebih dahulu.']);
        }

        // Jika sudah login, lanjutkan ke halaman yang diminta
        return $next($request);
    }
}
