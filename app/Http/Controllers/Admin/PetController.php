<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;

class PetController extends Controller
{
    // ✅ Menampilkan daftar pet
    public function index()
    {
        $data = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('Admin.Pet.pet', compact('data'));
    }

    // ✅ Form tambah pet
    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $ras = RasHewan::all();
        return view('Admin.Pet.create', compact('pemilik', 'ras'));
    }

    // ✅ Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);

        Pet::create($request->all());
        return redirect()->route('pet.index')->with('success', 'Data hewan berhasil ditambahkan.');
    }

    // ✅ Form edit
    public function edit($id)
    {
        $data = Pet::findOrFail($id);
        $pemilik = Pemilik::with('user')->get();
        $ras = RasHewan::all();
        return view('Admin.Pet.edit', compact('data', 'pemilik', 'ras'));
    }

    // ✅ Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer',
        ]);

        $data = Pet::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pet.index')->with('success', 'Data hewan berhasil diperbarui.');
    }

    // ✅ Hapus data
    public function destroy($id)
    {
        Pet::findOrFail($id)->delete();
        return redirect()->route('pet.index')->with('success', 'Data hewan berhasil dihapus.');
    }
}
