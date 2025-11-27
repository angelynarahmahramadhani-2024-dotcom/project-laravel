<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Dokter;

class ProfilController extends Controller
{
    // View profil dokter
    public function index()
    {
        $user = Auth::user();
        $user->load(['roleUser.role', 'dokter']);

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
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'bidang_dokter' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        // Update user data
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        // Update atau create data dokter
        Dokter::updateOrCreate(
            ['id_user' => $user->iduser],
            [
                'alamat' => $validated['alamat'] ?? null,
                'no_hp' => $validated['no_hp'] ?? null,
                'bidang_dokter' => $validated['bidang_dokter'] ?? null,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
            ]
        );

        return redirect()->route('dokter.profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
