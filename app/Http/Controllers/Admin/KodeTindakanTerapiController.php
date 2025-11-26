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
        // VALIDASI
        $validated = $this->validateTindakan($request);

        // FORMAT
        $validated['kode'] = $this->formatKode($validated['kode']);
        $validated['deskripsi_tindakan_terapi'] = $this->formatDeskripsi($validated['deskripsi_tindakan_terapi']);

        // CEK KODE DUPLIKAT
        if (KodeTindakanTerapi::where('kode', $validated['kode'])->exists()) {
            return redirect()->back()
                ->withInput()
                ->with('error', '❌ Kode tindakan "' . $validated['kode'] . '" sudah terdaftar. Silakan gunakan kode yang berbeda.');
        }

        // SIMPAN VIA HELPER
        $this->createTindakan($validated);

        return redirect()->route('admin.KodeTindakanTerapi.index')
            ->with('success', '✅ Kode tindakan berhasil ditambahkan.');
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
        // VALIDASI
        $validated = $this->validateTindakan($request);

        $validated['kode'] = $this->formatKode($validated['kode']);
        $validated['deskripsi_tindakan_terapi'] = $this->formatDeskripsi($validated['deskripsi_tindakan_terapi']);

        // CEK DUPLIKAT KODE (tidak berlaku untuk dirinya sendiri)
        if (KodeTindakanTerapi::where('kode', $validated['kode'])
            ->where('idkode_tindakan_terapi', '!=', $id)
            ->exists()) 
        {
            return redirect()->back()
                ->withInput()
                ->with('error', '❌ Kode tindakan "' . $validated['kode'] . '" sudah digunakan. Silakan gunakan kode yang berbeda.');
        }

        $data = KodeTindakanTerapi::findOrFail($id);
        $data->update($validated);

        return redirect()->route('admin.KodeTindakanTerapi.index')
            ->with('success', '✏️ Kode tindakan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KodeTindakanTerapi::findOrFail($id)->delete();

        return redirect()->route('admin.KodeTindakanTerapi.index')
            ->with('success', '🗑️ Kode tindakan berhasil dihapus.');
    }


    /* ============================================================
        VALIDASI (Modul 11)
    ============================================================ */
    private function validateTindakan($request)
    {
        return $request->validate([
            'kode' => 'required|string|max:10',
            'deskripsi_tindakan_terapi' => 'required|string|max:1000',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis'
        ]);
    }

    /* ============================================================
        HELPER CREATE
    ============================================================ */
    private function createTindakan($data)
    {
        KodeTindakanTerapi::create($data);
    }

    /* ============================================================
        HELPER FORMAT
    ============================================================ */
    private function formatKode($text)
    {
        return strtoupper(trim($text));
    }

    private function formatDeskripsi($text)
    {
        return ucfirst(trim($text));
    }
}