<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DokterAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Periksa apakah session dokter ada
         if (!session('dokter_id')) {
            return redirect()->route('dokter.login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }
        return $next($request);
    }
}
