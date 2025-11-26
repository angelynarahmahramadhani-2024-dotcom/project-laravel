<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // View profil dokter
    public function index()
    {
        $user = Auth::user();
        $user->load('roleUser.role');

        return view('Dokter.Profil.index', compact('user'));
    }

    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => 'required|string|max:100|min:3',
            'email' => 'required|email|unique:user,email,' . $user->iduser . ',iduser',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->nama = $validated['nama'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('dokter.profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
