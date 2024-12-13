<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PasienAuth
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('pasien')->check()) {
            return redirect()->route('pasien.login');
        }
        return $next($request);
    }
}
