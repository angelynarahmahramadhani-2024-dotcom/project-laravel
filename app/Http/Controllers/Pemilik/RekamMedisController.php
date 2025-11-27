<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\TemuDokter;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    // Semua rekam medis pet milik pemilik
    public function index()
    {
        $user = Auth::user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return redirect()->route('pemilik.dashboard')->with('error', 'Data pemilik tidak ditemukan.');
        }

        $petIds = Pet::where('idpemilik', $pemilik->idpemilik)->pluck('idpet');
        $temuDokterIds = TemuDokter::whereIn('idpet', $petIds)->pluck('idreservasi_dokter');

        $data = RekamMedis::with(['temuDokter.pet.rasHewan', 'dokter', 'detailRekamMedis'])
            ->whereIn('idreservasi_dokter', $temuDokterIds)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Pemilik.RekamMedis.index', compact('data'));
    }

    // Detail rekam medis
    public function show($id)
    {
        $user = Auth::user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return redirect()->route('pemilik.dashboard')->with('error', 'Data pemilik tidak ditemukan.');
        }

        $petIds = Pet::where('idpemilik', $pemilik->idpemilik)->pluck('idpet');
        $temuDokterIds = TemuDokter::whereIn('idpet', $petIds)->pluck('idreservasi_dokter');

        $rekamMedis = RekamMedis::with([
            'temuDokter.pet.rasHewan.jenisHewan',
            'dokter',
            'detailRekamMedis.kodeTindakanTerapi'
        ])
            ->whereIn('idreservasi_dokter', $temuDokterIds)
            ->where('idrekam_medis', $id)
            ->firstOrFail();

        return view('Pemilik.RekamMedis.show', compact('rekamMedis'));
    }
}
