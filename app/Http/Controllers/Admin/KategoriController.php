<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('Admin.Kategori.Kategori', compact('data'));
    }

    public function create()
    {
        return view('Admin.Kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $nextId = Kategori::max('idkategori') + 1;

        Kategori::create([
            'idkategori' => $nextId,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/Kategori')->with('success', '✅ Kategori baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Admin.Kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update(['nama_kategori' => $request->nama_kategori]);

        return redirect('/Kategori')->with('success', '✏️ Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/Kategori')->with('success', '🗑️ Kategori berhasil dihapus!');
    }
}