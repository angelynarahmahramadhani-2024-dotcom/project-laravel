<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    // List semua rekam medis
    public function index()
    {
        $user = Auth::user();

        $data = RekamMedis::with(['temuDokter.pet.pemilik.user', 'temuDokter.pet.rasHewan', 'dokter', 'detailRekamMedis'])
            ->where('dokter_pemeriksa', $user->iduser)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Dokter.RekamMedis.index', compact('data'));
    }

    // Detail rekam medis
    public function show($id)
    {
        $rekamMedis = RekamMedis::with([
            'temuDokter.pet.pemilik.user', 
            'temuDokter.pet.rasHewan.jenisHewan',
            'dokter',
            'detailRekamMedis.kodeTindakanTerapi'
        ])->findOrFail($id);

        return view('Dokter.RekamMedis.show', compact('rekamMedis'));
    }

    // Form buat rekam medis baru (dari reservasi)
    public function create($idreservasi)
    {
        $temuDokter = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan'])
            ->findOrFail($idreservasi);

        // Cek apakah sudah ada rekam medis
        $existingRekamMedis = RekamMedis::where('idreservasi_dokter', $idreservasi)->first();
        if ($existingRekamMedis) {
            return redirect()->route('dokter.rekammedis.show', $existingRekamMedis->idrekam_medis)
                ->with('info', 'Rekam medis sudah ada untuk reservasi ini.');
        }

        return view('Dokter.RekamMedis.create', compact('temuDokter'));
    }

    // Simpan rekam medis baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idreservasi_dokter' => 'required|exists:temu_dokter,idreservasi_dokter',
            'anamnesa' => 'required|string|max:1000',
            'temuan_klinis' => 'required|string|max:1000',
            'diagnosa' => 'required|string|max:1000',
        ]);

        $user = Auth::user();

        $rekamMedis = RekamMedis::create([
            'idreservasi_dokter' => $validated['idreservasi_dokter'],
            'anamnesa' => $validated['anamnesa'],
            'temuan_klinis' => $validated['temuan_klinis'],
            'diagnosa' => $validated['diagnosa'],
            'dokter_pemeriksa' => $user->iduser,
            'created_at' => now(),
        ]);

        // Update status reservasi menjadi Selesai
        TemuDokter::where('idreservasi_dokter', $validated['idreservasi_dokter'])
            ->update(['status' => 'S']);

        return redirect()->route('dokter.rekammedis.show', $rekamMedis->idrekam_medis)
            ->with('success', 'Rekam medis berhasil disimpan.');
    }

    // Edit rekam medis
    public function edit($id)
    {
        $rekamMedis = RekamMedis::with(['temuDokter.pet.pemilik.user', 'temuDokter.pet.rasHewan.jenisHewan'])
            ->findOrFail($id);

        return view('Dokter.RekamMedis.edit', compact('rekamMedis'));
    }

    // Update rekam medis
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'anamnesa' => 'required|string|max:1000',
            'temuan_klinis' => 'required|string|max:1000',
            'diagnosa' => 'required|string|max:1000',
        ]);

        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->update($validated);

        return redirect()->route('dokter.rekammedis.show', $id)
            ->with('success', 'Rekam medis berhasil diperbarui.');
    }
}
