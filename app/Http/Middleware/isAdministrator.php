<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdministrator
{
    public function handle($request, Closure $next)
    {
        // Jika belum login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil role user dari relasi
        $user = Auth::user();
        $roleUser = $user->roleUser;
        
        // Cek apakah user memiliki role
        if ($roleUser && $roleUser->count() > 0) {
            $role = $roleUser->first()->idrole ?? null;
            
            // Role 1 = Administrator
            if ($role == 1) {
                return $next($request);
            }
        }

        // Jika bukan admin
        return redirect('/')->with('error', 'Anda tidak memiliki akses Administrator!');
    }
}