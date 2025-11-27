<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // View profil pemilik
    public function index()
    {
        $user = Auth::user();
        $user->load('roleUser.role');
        
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();
        
        $pets = Pet::with(['rasHewan.jenisHewan'])
            ->where('idpemilik', $pemilik->idpemilik ?? 0)
            ->orderBy('idpet', 'asc')
            ->get();

        return view('Pemilik.Profil.index', compact('user', 'pemilik', 'pets'));
    }

    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => 'required|string|max:100|min:3',
            'email' => 'required|email|unique:user,email,' . $user->iduser . ',iduser',
            'no_wa' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update user
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        // Update pemilik
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();
        if ($pemilik) {
            $pemilik->no_wa = $validated['no_wa'];
            $pemilik->alamat = $validated['alamat'];
            $pemilik->save();
        }

        return redirect()->route('pemilik.profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
