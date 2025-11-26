<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;
use App\Models\JenisHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $data = RasHewan::with('jenisHewan')->get();
        return view('Admin.rashewan.RasHewan', compact('data'));
    }

    public function create()
    {
        $jenis = JenisHewan::all();
        return view('Admin.rashewan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        // Validasi via helper
        $validated = $this->validateRasHewan($request);

        // Format Nama
        $validated['nama_ras'] = $this->formatNamaRas($validated['nama_ras']);

        // Insert via helper
        $this->createRasHewan($validated);

        return redirect()->route('admin.rashewan.index')
            ->with('success', '✅ Ras hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ras = RasHewan::findOrFail($id);
        $jenis = JenisHewan::all();

        return view('Admin.rashewan.edit', compact('ras', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi via helper
        $validated = $this->validateRasHewan($request);

        // Format nama
        $validated['nama_ras'] = $this->formatNamaRas($validated['nama_ras']);

        $ras = RasHewan::findOrFail($id);
        $ras->update($validated);

        return redirect()->route('admin.rashewan.index')
            ->with('success', '✏️ Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        RasHewan::findOrFail($id)->delete();

        return redirect()->route('admin.rashewan.index')
            ->with('success', '🗑️ Data berhasil dihapus!');
    }

    /* ============================================================
        VALIDASI SESUAI MODUL
    ============================================================ */
    private function validateRasHewan($request)
    {
        return $request->validate([
            'nama_ras' => 'required|string|max:100|min:3',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);
    }

    /* ============================================================
        HELPER INSERT DATA
    ============================================================ */
    private function createRasHewan($data)
    {
        RasHewan::create([
            'nama_ras' => $data['nama_ras'],
            'idjenis_hewan' => $data['idjenis_hewan'],
        ]);
    }

    /* ============================================================
        HELPER FORMAT NAMA
    ============================================================ */
    private function formatNamaRas($text)
    {
        return ucwords(strtolower($text));
    }
}
