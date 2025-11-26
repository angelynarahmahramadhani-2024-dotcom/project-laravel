<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        // Coba login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }

        $user = Auth::user();

        // Ambil role dari relasi user → roleUser → role
        $role = $user->roleUser->first()->idrole ?? null;

        // Redirect berdasarkan role
        switch ($role) {
            case 1:
                return redirect()->route('admin.dashboard');

            case 2:
                 return redirect()->route('dokter.dashboard')->with('success', 'Login berhasil!');

            case 3:
                return redirect()->route('perawat.dashboard');

            case 4:
                return redirect()->route('resepsionis.dashboard');

            default:
                return redirect()->route('pemilik.dashboard');
        }
    }
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Berhasil logout!');
}
}