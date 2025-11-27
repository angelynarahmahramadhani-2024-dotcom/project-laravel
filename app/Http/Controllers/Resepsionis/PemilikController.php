<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PemilikController extends Controller
{
    public function index()
    {
        $pemiliks = Pemilik::with(['user', 'pets'])->orderBy('idpemilik', 'asc')->get();
        return view('Resepsionis.Pemilik.index', compact('pemiliks'));
    }

    public function create()
    {
        // Ambil user yang punya role pemilik (idrole=5) tapi belum terdaftar di tabel pemilik
        $users = User::whereHas('roleUser', function($q) {
                $q->where('idrole', 5); // role pemilik
            })
            ->whereDoesntHave('pemilik') // belum ada di tabel pemilik
            ->get();
        
        return view('Resepsionis.Pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser|unique:pemilik,iduser',
            'alamat' => 'nullable|string',
            'no_wa' => 'nullable|string|max:20',
        ]);

        // Generate idpemilik (karena tidak auto increment)
        $lastId = Pemilik::max('idpemilik') ?? 0;
        $newId = $lastId + 1;

        // Buat pemilik dari user yang dipilih
        Pemilik::create([
            'idpemilik' => $newId,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
            'iduser' => $request->iduser,
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
            'no_wa' => 'nullable|string|max:20',
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
            'no_wa' => $request->no_wa,
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
