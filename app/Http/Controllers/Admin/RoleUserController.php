<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;

class RoleUserController extends Controller
{
    // LIST DATA
    public function index()
    {
        $users = User::with(['roleUser.role'])->get();
        $roles = Role::all();
        return view('Admin.User.roleuser', compact('users', 'roles'));
    }

    // SIMPAN ROLE UNTUK USER
    public function store(Request $request)
    {
        // VALIDASI via helper
        $validated = $this->validateRoleUser($request);

        // SIMPAN VIA HELPER
        $this->createRoleUser($validated);

        return redirect()->route('admin.roleuser.index')
            ->with('success', '✅ Role berhasil ditambahkan ke user.');
    }

    // UPDATE STATUS AKTIF/NONAKTIF
    public function updateStatus($id)
    {
        $roleUser = RoleUser::findOrFail($id);
        $roleUser->status = !$roleUser->status;
        $roleUser->save();

        return redirect()->route('admin.roleuser.index')
            ->with('success', '✏️ Status role user berhasil diperbarui.');
    }

    // HAPUS ROLE USER
    public function destroy($id)
    {
        RoleUser::findOrFail($id)->delete();

        return redirect()->route('admin.roleuser.index')
            ->with('success', '🗑️ Role user berhasil dihapus.');
    }

    /* ============================================================
        VALIDASI ROLE USER
    ============================================================ */
    private function validateRoleUser($request)
    {
        return $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'required|boolean',
        ]);
    }

    /* ============================================================
        HELPER INSERT ROLE USER
    ============================================================ */
    private function createRoleUser($data)
    {
        RoleUser::create([
            'iduser' => $data['iduser'],
            'idrole' => $data['idrole'],
            'status' => $data['status'],
        ]);
    }
}