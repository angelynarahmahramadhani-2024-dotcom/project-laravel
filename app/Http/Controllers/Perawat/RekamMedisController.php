<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\TemuDokter;

class RekamMedisController extends Controller
{
    // List semua rekam medis
    public function index()
    {
        $data = RekamMedis::with(['temuDokter.pet.pemilik.user', 'temuDokter.pet.rasHewan', 'dokter', 'detailRekamMedis'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Perawat.RekamMedis.index', compact('data'));
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

        return view('Perawat.RekamMedis.show', compact('rekamMedis'));
    }

    // Form buat rekam medis baru (dari reservasi)
    public function create($idreservasi)
    {
        $temuDokter = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan'])
            ->findOrFail($idreservasi);

        // Cek apakah sudah ada rekam medis
        $existingRekamMedis = RekamMedis::where('idreservasi_dokter', $idreservasi)->first();
        if ($existingRekamMedis) {
            return redirect()->route('perawat.rekammedis.show', $existingRekamMedis->idrekam_medis)
                ->with('info', 'Rekam medis sudah ada untuk reservasi ini.');
        }

        return view('Perawat.RekamMedis.create', compact('temuDokter'));
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

        // Ambil data reservasi untuk mendapatkan dokter yang ditugaskan
        $temuDokter = TemuDokter::with('roleUser')->findOrFail($validated['idreservasi_dokter']);

        // Generate ID rekam medis
        $maxId = RekamMedis::max('idrekam_medis') ?? 0;
        $newId = $maxId + 1;

        // Dokter pemeriksa diambil dari dokter yang ditugaskan pada reservasi
        $dokterPemeriksa = $temuDokter->roleUser->iduser;

        $rekamMedis = RekamMedis::create([
            'idrekam_medis' => $newId,
            'idreservasi_dokter' => $validated['idreservasi_dokter'],
            'anamnesa' => $validated['anamnesa'],
            'temuan_klinis' => $validated['temuan_klinis'],
            'diagnosa' => $validated['diagnosa'],
            'dokter_pemeriksa' => $dokterPemeriksa,
            'created_at' => now(),
        ]);

        // Update status reservasi menjadi Proses
        TemuDokter::where('idreservasi_dokter', $validated['idreservasi_dokter'])
            ->update(['status' => 'P']);

        return redirect()->route('perawat.rekammedis.show', $rekamMedis->idrekam_medis)
            ->with('success', 'Rekam medis berhasil disimpan.');
    }

    // Edit rekam medis
    public function edit($id)
    {
        $rekamMedis = RekamMedis::with(['temuDokter.pet.pemilik.user', 'temuDokter.pet.rasHewan.jenisHewan'])
            ->findOrFail($id);

        return view('Perawat.RekamMedis.edit', compact('rekamMedis'));
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

        return redirect()->route('perawat.rekammedis.show', $id)
            ->with('success', 'Rekam medis berhasil diperbarui.');
    }

    // Hapus rekam medis
    public function destroy($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        
        // Hapus detail rekam medis terlebih dahulu
        $rekamMedis->detailRekamMedis()->delete();
        
        // Hapus rekam medis
        $rekamMedis->delete();

        return redirect()->route('perawat.rekammedis.index')
            ->with('success', 'Rekam medis berhasil dihapus.');
    }
}
