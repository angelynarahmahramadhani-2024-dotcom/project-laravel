<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perawat;
use App\Models\User;
use App\Models\RoleUser;

class PerawatController extends Controller
{
    // List semua perawat
    public function index()
    {
        $data = Perawat::with('user')->get();
        
        // Juga ambil user yang belum punya data perawat tapi role-nya perawat
        $userPerawatIds = RoleUser::whereHas('role', function($q) {
            $q->whereRaw('LOWER(nama_role) = ?', ['perawat']);
        })->pluck('iduser');
        
        $usersTanpaDataPerawat = User::whereIn('iduser', $userPerawatIds)
            ->whereDoesntHave('perawat')
            ->get();

        return view('Admin.Perawat.index', compact('data', 'usersTanpaDataPerawat'));
    }

    // Form create data perawat
    public function create()
    {
        // Ambil user yang role-nya perawat tapi belum punya data di tabel perawat
        $userPerawatIds = RoleUser::whereHas('role', function($q) {
            $q->whereRaw('LOWER(nama_role) = ?', ['perawat']);
        })->pluck('iduser');
        
        $users = User::whereIn('iduser', $userPerawatIds)
            ->whereDoesntHave('perawat')
            ->get();

        return view('Admin.Perawat.create', compact('users'));
    }

    // Simpan data perawat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:user,iduser|unique:perawat,id_user',
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'jenis_kelamin' => 'nullable|in:L,P',
            'pendidikan' => 'nullable|string|max:100',
        ]);

        Perawat::create($validated);

        return redirect()->route('admin.perawat.index')
            ->with('success', 'Data perawat berhasil ditambahkan.');
    }

    // Form edit data perawat
    public function edit($id)
    {
        $perawat = Perawat::with('user')->findOrFail($id);
        return view('Admin.Perawat.edit', compact('perawat'));
    }

    // Update data perawat
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'jenis_kelamin' => 'nullable|in:L,P',
            'pendidikan' => 'nullable|string|max:100',
        ]);

        $perawat = Perawat::findOrFail($id);
        $perawat->update($validated);

        return redirect()->route('admin.perawat.index')
            ->with('success', 'Data perawat berhasil diperbarui.');
    }

    // Hapus data perawat
    public function destroy($id)
    {
        $perawat = Perawat::findOrFail($id);
        $perawat->delete();

        return redirect()->route('admin.perawat.index')
            ->with('success', 'Data perawat berhasil dihapus.');
    }
}
