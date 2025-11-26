<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isPerawat
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Dapatkan role user (sesuai struktur tabelmu)
        $role = $user->roleUser->first()->idrole ?? null;

        // Role perawat = 3 (sesuai login controller yg kamu buat)
        if ($role != 3) {
            return redirect()->route('login')
                ->with('error', 'Anda tidak memiliki akses sebagai perawat.');
        }

        return $next($request);
    }
}
