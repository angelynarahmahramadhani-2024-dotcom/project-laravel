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
        // VALIDASI
        $validated = $this->validateKategori($request);

        // FORMAT
        $validated['nama_kategori'] = $this->formatNamaKategori($validated['nama_kategori']);

        // SIMPAN VIA HELPER
        $this->createKategori($validated);

        return redirect()->route('admin.kategori.index')
            ->with('success', '✅ Kategori baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Admin.Kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        // VALIDASI
        $validated = $this->validateKategori($request);

        // FORMAT
        $validated['nama_kategori'] = $this->formatNamaKategori($validated['nama_kategori']);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('admin.kategori.index')
            ->with('success', '✏️ Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', '🗑️ Kategori berhasil dihapus!');
    }

    /* ============================================================
        VALIDASI (SESUI MODUL 11)
    ============================================================ */
    private function validateKategori($request)
    {
        return $request->validate([
            'nama_kategori' => 'required|string|max:100|min:3',
        ]);
    }

    /* ============================================================
        HELPER CREATE
    ============================================================ */
    private function createKategori($data)
    {
        $nextId = Kategori::max('idkategori') + 1;

        Kategori::create([
            'idkategori' => $nextId,
            'nama_kategori' => $data['nama_kategori'],
        ]);
    }

    /* ============================================================
        HELPER FORMAT NAMA
    ============================================================ */
    private function formatNamaKategori($text)
    {
        return ucwords(strtolower($text));
    }
}