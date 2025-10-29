<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        // 🔹 Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // 🔹 Ambil data user dan role aktif
        $user = User::with(['roleUser' => function ($query) {
            $query->where('status', 1);
        }, 'roleUser.role'])
        ->where('email', $request->input('email'))
        ->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        // 🔹 Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        // 🔹 Dapatkan role aktif
        $roleAktif = $user->roleUser[0]->role->nama_role ?? 'User';

        // 🔹 Login ke sistem
        Auth::login($user);

        // 🔹 Simpan ke session
        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'user_role' => $roleAktif,
        ]);

        // 🔹 Redirect sesuai role (sesuai Modul 10)
        switch (strtolower($roleAktif)) {
            case 'administrator':
            case 'admin':
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang Admin!');
            case 'dokter':
                return redirect()->route('dokter.dashboard')->with('success', 'Selamat datang Dokter!');
            case 'perawat':
                return redirect()->route('perawat.dashboard')->with('success', 'Selamat datang Perawat!');
            case 'resepsionis':
                return redirect()->route('resepsionis.dashboard')->with('success', 'Selamat datang Resepsionis!');
            case 'pemilik':
                return redirect()->route('pemilik.dashboard')->with('success', 'Selamat datang Pemilik!');
            default:
                return redirect('/home')->with('success', 'Login berhasil!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}
