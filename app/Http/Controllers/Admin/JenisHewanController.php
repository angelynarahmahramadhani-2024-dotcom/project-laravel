<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisHewan = DB::table('jenis_hewan')->get();
        return view('admin.jenis_hewan.index', compact('jenisHewan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis_hewan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|min:3'
        ], [
            'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi',
            'nama_jenis_hewan.min' => 'Minimal 3 karakter',
        ]);

        DB::table('jenis_hewan')->insert([
            'nama_jenis_hewan' => ucwords(strtolower($request->nama_jenis_hewan))
        ]);

        return redirect()->route('admin.jenishewan.index')
            ->with('success', 'Jenis hewan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenisHewan = DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first();
        
        if (!$jenisHewan) {
            return redirect()->route('admin.jenishewan.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.jenis_hewan.show', compact('jenisHewan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisHewan = DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first();
        
        if (!$jenisHewan) {
            return redirect()->route('admin.jenishewan.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.jenis_hewan.edit', compact('jenisHewan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|min:3'
        ], [
            'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi',
            'nama_jenis_hewan.min' => 'Minimal 3 karakter',
        ]);

        DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->update([
                'nama_jenis_hewan' => ucwords(strtolower($request->nama_jenis_hewan))
            ]);

        return redirect()->route('admin.jenishewan.index')
            ->with('success', 'Jenis hewan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->delete();

        return redirect()->route('admin.jenishewan.index')
            ->with('success', 'Jenis hewan berhasil dihapus.');
    }
}
