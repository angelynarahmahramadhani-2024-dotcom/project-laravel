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
        // VALIDASI
        $validated = $this->validateKategoriKlinis($request);

        // FORMAT
        $validated['nama_kategori_klinis'] = $this->formatNamaKategoriKlinis($validated['nama_kategori_klinis']);

        // SIMPAN VIA HELPER
        $this->createKategoriKlinis($validated);

        return redirect()->route('admin.kategoriKlinis.index')
            ->with('success', '✅ Kategori Klinis baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = KategoriKlinis::findOrFail($id);
        return view('Admin.KategoriKlinis.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // VALIDASI
        $validated = $this->validateKategoriKlinis($request);

        // FORMAT
        $validated['nama_kategori_klinis'] = $this->formatNamaKategoriKlinis($validated['nama_kategori_klinis']);

        $data = KategoriKlinis::findOrFail($id);
        $data->update($validated);

        return redirect()->route('admin.kategoriKlinis.index')
            ->with('success', '✏️ Kategori Klinis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        KategoriKlinis::findOrFail($id)->delete();

        return redirect()->route('admin.kategoriKlinis.index')
            ->with('success', '🗑️ Kategori Klinis berhasil dihapus!');
    }


    /* ============================================================
        VALIDASI (SESUAI MODUL 11)
    ============================================================ */
    private function validateKategoriKlinis($request)
    {
        return $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100|min:3',
        ]);
    }

    /* ============================================================
        HELPER CREATE KATEGORI KLINIS
    ============================================================ */
    private function createKategoriKlinis($data)
    {
        $nextId = KategoriKlinis::max('idkategori_klinis') + 1;

        KategoriKlinis::create([
            'idkategori_klinis' => $nextId,
            'nama_kategori_klinis' => $data['nama_kategori_klinis'],
        ]);
    }

    /* ============================================================
        HELPER FORMAT NAMA
    ============================================================ */
    private function formatNamaKategoriKlinis($text)
    {
        return ucwords(strtolower($text));
    }
}
