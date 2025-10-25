<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $data = KategoriKlinis::all();
        return view('Admin.KategoriKlinis.KategoriKlinis', compact('data'));
    }

    public function create()
    {
        return view('Admin.KategoriKlinis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);

        $nextId = KategoriKlinis::max('idkategori_klinis') + 1;

        KategoriKlinis::create([
            'idkategori_klinis' => $nextId,
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect('/KategoriKlinis')->with('success', '✅ Kategori Klinis baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = KategoriKlinis::findOrFail($id);
        return view('Admin.KategoriKlinis.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100',
        ]);

        $data = KategoriKlinis::findOrFail($id);
        $data->update(['nama_kategori_klinis' => $request->nama_kategori_klinis]);

        return redirect('/KategoriKlinis')->with('success', '✏️ Kategori Klinis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = KategoriKlinis::findOrFail($id);
        $data->delete();

        return redirect('/KategoriKlinis')->with('success', '🗑️ Kategori Klinis berhasil dihapus!');
    }
}
