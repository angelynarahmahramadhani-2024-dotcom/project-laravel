<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;

class PetController extends Controller
{
    // LIST DATA
    public function index()
    {
        $data = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('Admin.Pet.pet', compact('data'));
    }

    // FORM CREATE
    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $ras = RasHewan::all();
        return view('Admin.Pet.create', compact('pemilik', 'ras'));
    }

    // SIMPAN DATA BARU
    public function store(Request $request)
    {
        // VALIDASI via helper
        $validated = $this->validatePet($request);

        // FORMAT NAMA hewan via helper
        $validated['nama'] = $this->formatNamaPet($validated['nama']);

        // SIMPAN VIA HELPER
        $this->createPet($validated);

        return redirect()->route('admin.pet.index')
            ->with('success', '✅ Data hewan berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data = Pet::findOrFail($id);
        $pemilik = Pemilik::with('user')->get();
        $ras = RasHewan::all();
        return view('Admin.Pet.edit', compact('data', 'pemilik', 'ras'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        // VALIDASI
        $validated = $this->validatePet($request);

        // FORMAT NAMA hewan
        $validated['nama'] = $this->formatNamaPet($validated['nama']);

        $data = Pet::findOrFail($id);
        $data->update($validated);

        return redirect()->route('admin.pet.index')
            ->with('success', '✏️ Data hewan berhasil diperbarui.');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        Pet::findOrFail($id)->delete();

        return redirect()->route('admin.pet.index')
            ->with('success', '🗑️ Data hewan berhasil dihapus.');
    }

    /* ============================================================
        VALIDASI PET
    ============================================================ */
    private function validatePet($request)
    {
        return $request->validate([
            'nama' => 'required|string|max:100|min:2',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik' => 'required|integer|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|integer|exists:ras_hewan,idras_hewan',
        ]);
    }

    /* ============================================================
        HELPER INSERT PET
    ============================================================ */
    private function createPet($data)
    {
        Pet::create([
            'nama' => $data['nama'],
            'tanggal_lahir' => $data['tanggal_lahir'] ?? null,
            'warna_tanda' => $data['warna_tanda'] ?? null,
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik' => $data['idpemilik'],
            'idras_hewan' => $data['idras_hewan'],
        ]);
    }

    /* ============================================================
        HELPER FORMAT NAMA PET
    ============================================================ */
    private function formatNamaPet($text)
    {
        return ucwords(strtolower(trim($text)));
    }
}
