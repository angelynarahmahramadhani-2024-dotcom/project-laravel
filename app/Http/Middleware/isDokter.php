<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isDokter
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $role = Auth::user()->roleUser->first()->idrole ?? null;

        // Role 2 = Dokter
        if ($role == 2) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'Anda tidak memiliki akses sebagai Dokter.');
    }
}
