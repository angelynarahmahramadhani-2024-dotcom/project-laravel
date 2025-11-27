<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;
use App\Models\RoleUser;

class DokterController extends Controller
{
    // List semua dokter
    public function index()
    {
        $data = Dokter::with('user')->get();
        
        // Juga ambil user yang belum punya data dokter tapi role-nya dokter
        $userDokterIds = RoleUser::whereHas('role', function($q) {
            $q->whereRaw('LOWER(nama_role) = ?', ['dokter']);
        })->pluck('iduser');
        
        $usersTanpaDataDokter = User::whereIn('iduser', $userDokterIds)
            ->whereDoesntHave('dokter')
            ->get();

        return view('Admin.Dokter.index', compact('data', 'usersTanpaDataDokter'));
    }

    // Form create data dokter
    public function create()
    {
        // Ambil user yang role-nya dokter tapi belum punya data di tabel dokter
        $userDokterIds = RoleUser::whereHas('role', function($q) {
            $q->whereRaw('LOWER(nama_role) = ?', ['dokter']);
        })->pluck('iduser');
        
        $users = User::whereIn('iduser', $userDokterIds)
            ->whereDoesntHave('dokter')
            ->get();

        return view('Admin.Dokter.create', compact('users'));
    }

    // Simpan data dokter baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:user,iduser|unique:dokter,id_user',
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'bidang_dokter' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        Dokter::create($validated);

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan.');
    }

    // Form edit data dokter
    public function edit($id)
    {
        $dokter = Dokter::with('user')->findOrFail($id);
        return view('Admin.Dokter.edit', compact('dokter'));
    }

    // Update data dokter
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'bidang_dokter' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($validated);

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }

    // Hapus data dokter
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil dihapus.');
    }
}
