<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;
use App\Models\TemuDokter;

class DetailRekamMedisController extends Controller
{
    // Form tambah detail rekam medis
    public function create($idrekam_medis)
    {
        $rekamMedis = RekamMedis::with(['temuDokter.pet'])->findOrFail($idrekam_medis);
        $kodeTindakan = KodeTindakanTerapi::all();

        return view('Dokter.DetailRekamMedis.create', compact('rekamMedis', 'kodeTindakan'));
    }

    // Simpan detail rekam medis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'nullable|string|max:1000',
        ]);

        DetailRekamMedis::create($validated);

        // Update status reservasi menjadi Selesai (S)
        $rekamMedis = RekamMedis::find($validated['idrekam_medis']);
        if ($rekamMedis && $rekamMedis->idreservasi_dokter) {
            TemuDokter::where('idreservasi_dokter', $rekamMedis->idreservasi_dokter)
                ->update(['status' => 'S']);
        }

        return redirect()->route('dokter.rekammedis.show', $validated['idrekam_medis'])
            ->with('success', 'Detail tindakan berhasil ditambahkan. Status pasien diubah menjadi Selesai.');
    }

    // Form edit detail rekam medis
    public function edit($id)
    {
        $detail = DetailRekamMedis::with(['rekamMedis.temuDokter.pet'])->findOrFail($id);
        $kodeTindakan = KodeTindakanTerapi::all();

        return view('Dokter.DetailRekamMedis.edit', compact('detail', 'kodeTindakan'));
    }

    // Update detail rekam medis
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'nullable|string|max:1000',
        ]);

        $detail = DetailRekamMedis::findOrFail($id);
        $detail->update($validated);

        return redirect()->route('dokter.rekammedis.show', $detail->idrekam_medis)
            ->with('success', 'Detail tindakan berhasil diperbarui.');
    }

    // Hapus detail rekam medis
    public function destroy($id)
    {
        $detail = DetailRekamMedis::findOrFail($id);
        $idrekam_medis = $detail->idrekam_medis;
        $detail->delete();

        return redirect()->route('dokter.rekammedis.show', $idrekam_medis)
            ->with('success', 'Detail tindakan berhasil dihapus.');
    }
}
