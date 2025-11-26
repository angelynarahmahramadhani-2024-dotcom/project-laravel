<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PemilikController extends Controller
{
    public function index()
    {
        $pemiliks = Pemilik::with(['user', 'pets'])->orderBy('idpemilik', 'desc')->get();
        return view('Resepsionis.Pemilik.index', compact('pemiliks'));
    }

    public function create()
    {
        return view('Resepsionis.Pemilik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        // Buat user dulu
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Buat pemilik
        Pemilik::create([
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'iduser' => $user->iduser,
        ]);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data pemilik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        return view('Resepsionis.Pemilik.edit', compact('pemilik'));
    }

    public function update(Request $request, $id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $pemilik->iduser . ',iduser',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        // Update user
        $pemilik->user->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        // Update password jika diisi
        if ($request->filled('password')) {
            $pemilik->user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Update pemilik
        $pemilik->update([
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data pemilik berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        
        // Cek apakah pemilik punya pet
        if ($pemilik->pet()->count() > 0) {
            return redirect()->route('resepsionis.pemilik.index')
                ->with('error', 'Tidak dapat menghapus! Pemilik masih memiliki pet.');
        }
        
        // Hapus user terkait
        if ($pemilik->user) {
            $pemilik->user->delete();
        }
        
        $pemilik->delete();

        return redirect()->route('resepsionis.pemilik.index')
            ->with('success', 'Data pemilik berhasil dihapus!');
    }
}
