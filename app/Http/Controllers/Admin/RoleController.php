<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    // ✅ Menampilkan daftar role
    public function index()
    {
        $data = Role::all();
        return view('Admin.Role.role', compact('data'));
    }

    // ✅ Form tambah
    public function create()
    {
        return view('Admin.Role.create');
    }

    // ✅ Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        Role::create($request->all());
        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    // ✅ Form edit
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view('Admin.Role.edit', compact('data'));
    }

    // ✅ Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_role' => 'required|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        $data = Role::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    }

    // ✅ Hapus data
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }
}
