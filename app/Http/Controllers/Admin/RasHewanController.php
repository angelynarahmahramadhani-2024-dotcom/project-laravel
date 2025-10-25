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
        $jenis = JenisHewan::all(); // untuk dropdown
        return view('Admin.rashewan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        RasHewan::create([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('rashewan.index')->with('success', '✅ Ras hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ras = RasHewan::findOrFail($id);
        $jenis = JenisHewan::all();
        return view('Admin.rashewan.edit', compact('ras', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        $ras = RasHewan::findOrFail($id);
        $ras->update([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('rashewan.index')->with('success', '✏️ Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ras = RasHewan::findOrFail($id);
        $ras->delete();

        return redirect()->route('rashewan.index')->with('success', '🗑️ Data berhasil dihapus!');
    }
}
