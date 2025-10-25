<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        $data = JenisHewan::all();
        return view('Admin.jenishewan.JenisHewan', compact('data'));
    }

    public function create()
    {
        return view('Admin.jenishewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        JenisHewan::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan,
        ]);

        return redirect()->route('jenishewan.index')->with('success', '✅ Jenis hewan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('Admin.jenishewan.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        $jenis = JenisHewan::findOrFail($id);
        $jenis->update([
            'nama_jenis_hewan' => $request->nama_jenis_hewan,
        ]);

        return redirect()->route('jenishewan.index')->with('success', '✏️ Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenishewan.index')->with('success', '🗑️ Data berhasil dihapus!');
    }
}