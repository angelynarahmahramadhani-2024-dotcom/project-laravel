<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Perawat;

class ProfilController extends Controller
{
    // View profil perawat
    public function index()
    {
        $user = Auth::user();
        $user->load(['roleUser.role', 'perawat']);

        return view('Perawat.Profil.index', compact('user'));
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
            'jenis_kelamin' => 'nullable|in:L,P',
            'pendidikan' => 'nullable|string|max:100',
        ]);

        // Update user data
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        // Update atau create data perawat
        Perawat::updateOrCreate(
            ['id_user' => $user->iduser],
            [
                'alamat' => $validated['alamat'] ?? null,
                'no_hp' => $validated['no_hp'] ?? null,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                'pendidikan' => $validated['pendidikan'] ?? null,
            ]
        );

        return redirect()->route('perawat.profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
