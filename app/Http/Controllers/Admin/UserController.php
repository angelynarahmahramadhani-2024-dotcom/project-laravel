<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST DATA
    public function index()
    {
        $data = User::with('roleUser.role')->get();
        return view('Admin.User.index', compact('data'));
    }

    // FORM CREATE
    public function create()
    {
        return view('Admin.User.create');
    }

    // SIMPAN DATA BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100|min:3',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('Admin.User.edit', compact('data'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100|min:3',
            'email' => 'required|email|unique:user,email,' . $id . ',iduser',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data->nama = $validated['nama'];
        $data->email = $validated['email'];
        
        if (!empty($validated['password'])) {
            $data->password = Hash::make($validated['password']);
        }
        
        $data->save();

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
