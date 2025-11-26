<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    // LIST DATA
    public function index()
    {
        $data = Role::all();
        return view('Admin.Role.role', compact('data'));
    }

    // FORM CREATE
    public function create()
    {
        return view('Admin.Role.create');
    }

    // SIMPAN DATA BARU
    public function store(Request $request)
    {
        // VALIDASI via helper
        $validated = $this->validateRole($request);

        // FORMAT NAMA via helper
        $validated['nama_role'] = $this->formatNamaRole($validated['nama_role']);

        // SIMPAN VIA HELPER
        $this->createRole($validated);

        return redirect()->route('admin.role.index')
            ->with('success', '✅ Role berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view('Admin.Role.edit', compact('data'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        // VALIDASI
        $validated = $this->validateRole($request);

        // FORMAT
        $validated['nama_role'] = $this->formatNamaRole($validated['nama_role']);

        $data = Role::findOrFail($id);
        $data->update($validated);

        return redirect()->route('admin.role.index')
            ->with('success', '✏️ Role berhasil diperbarui.');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('admin.role.index')
            ->with('success', '🗑️ Role berhasil dihapus.');
    }


    /* ============================================================
        VALIDASI (Sesuai Modul 11)
    ============================================================ */
    private function validateRole($request)
    {
        return $request->validate([
            'nama_role' => 'required|string|max:100|min:3',
            'deskripsi' => 'nullable|string|max:255',
        ]);
    }

    /* ============================================================
        HELPER INSERT ROLE
    ============================================================ */
    private function createRole($data)
    {
        Role::create([
            'nama_role' => $data['nama_role'],
            'deskripsi' => $data['deskripsi'] ?? null,
        ]);
    }

    /* ============================================================
        HELPER FORMAT
    ============================================================ */
    private function formatNamaRole($text)
    {
        return ucwords(strtolower(trim($text)));
    }
}
