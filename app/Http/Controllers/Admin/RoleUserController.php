<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;

class RoleUserController extends Controller
{
    // Menampilkan daftar user + role-nya
    public function index()
    {
        $users = User::with(['roleUser.role'])->get();
        $roles = Role::all();
        return view('Admin.User.roleuser', compact('users', 'roles'));
    }

    // Tambah role untuk user
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'idrole' => 'required',
            'status' => 'required|boolean',
        ]);

        RoleUser::create([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => $request->status,
        ]);

        return redirect()->route('roleuser.index')->with('success', 'Role berhasil ditambahkan.');
    }

    // Update status aktif/nonaktif
    public function updateStatus($id)
    {
        $roleUser = RoleUser::findOrFail($id);
        $roleUser->status = !$roleUser->status;
        $roleUser->save();

        return redirect()->route('roleuser.index')->with('success', 'Status role berhasil diperbarui.');
    }

    // Hapus role user
    public function destroy($id)
    {
        RoleUser::findOrFail($id)->delete();
        return redirect()->route('roleuser.index')->with('success', 'Role berhasil dihapus.');
    }

    
}
