<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isPemilik
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Ambil ID role dari relasi role_user
        $role = Auth::user()->roleUser->first()->idrole ?? null;

        if ($role != 5) {   // Pastikan 5 adalah ID role pemilik
            return redirect('/')->with('error', 'Anda tidak memiliki akses!');
        }

        return $next($request);
    }
}
