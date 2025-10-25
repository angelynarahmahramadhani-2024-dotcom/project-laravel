<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;

class PemilikController extends Controller
{
    public function index()
    {
        $data = Pemilik::with('user')->get();
        return view('Admin.pemilik.pemilik', compact('data'));
    }

    public function create()
    {
        $users = User::all();
        return view('Admin.pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_wa' => 'required|string|max:45',
            'alamat' => 'required|string|max:100',
            'iduser' => 'required|integer',
        ]);

        // Karena idpemilik bukan auto increment, kita buat manual
        $nextId = Pemilik::max('idpemilik') + 1;

        Pemilik::create([
            'idpemilik' => $nextId,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'iduser' => $request->iduser,
        ]);

        return redirect()->route('pemilik.index')->with('success', '✅ Data pemilik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $users = User::all();
        return view('Admin.pemilik.edit', compact('pemilik', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_wa' => 'required|string|max:45',
            'alamat' => 'required|string|max:100',
            'iduser' => 'required|integer',
        ]);

        $pemilik = Pemilik::findOrFail($id);
        $pemilik->update([
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'iduser' => $request->iduser,
        ]);

        return redirect()->route('pemilik.index')->with('success', '✏️ Data pemilik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pemilik::findOrFail($id)->delete();
        return redirect()->route('pemilik.index')->with('success', '🗑️ Data pemilik berhasil dihapus!');
    }
}