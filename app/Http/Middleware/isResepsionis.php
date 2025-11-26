<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isResepsionis
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Ambil role dari relasi role_user
        $role = Auth::user()->roleUser->first()->idrole ?? null;

        if ($role != 4) {   // 4 = ID role resepsionis
            return redirect('/')->with('error', 'Anda tidak memiliki akses!');
        }

        return $next($request);
    }
}
