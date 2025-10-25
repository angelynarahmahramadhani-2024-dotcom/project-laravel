<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $data = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('Admin.KodeTindakanTerapi.KodeTindakanTerapi', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('Admin.KodeTindakanTerapi.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|string|max:10',
        'deskripsi_tindakan_terapi' => 'required|string|max:1000',
        'idkategori' => 'required|integer',
        'idkategori_klinis' => 'required|integer'
    ]);

    // Cek apakah kode sudah ada
    if (KodeTindakanTerapi::where('kode', $request->kode)->exists()) {
        return redirect()->back()->with('error', '❌ Kode tindakan "' . $request->kode . '" sudah terdaftar. Silakan gunakan kode lain.');
    }

    KodeTindakanTerapi::create($request->all());
    return redirect()->route('KodeTindakanTerapi.index')->with('success', '✅ Kode tindakan berhasil ditambahkan.');
}


    public function edit($id)
    {
        $data = KodeTindakanTerapi::findOrFail($id);
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('Admin.KodeTindakanTerapi.edit', compact('data', 'kategori', 'kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'deskripsi_tindakan_terapi' => 'required|string|max:1000',
            'idkategori' => 'required|integer',
            'idkategori_klinis' => 'required|integer'
        ]);

        $data = KodeTindakanTerapi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('KodeTindakanTerapi.index')->with('success', 'Kode tindakan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = KodeTindakanTerapi::findOrFail($id);
        $data->delete();
        return redirect()->route('KodeTindakanTerapi.index')->with('success', 'Kode tindakan berhasil dihapus.');
    }
}
