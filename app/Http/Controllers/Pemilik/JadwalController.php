<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    // Semua jadwal temu dokter
    public function index()
    {
        $user = Auth::user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return redirect()->route('pemilik.dashboard')->with('error', 'Data pemilik tidak ditemukan.');
        }

        $petIds = Pet::where('idpemilik', $pemilik->idpemilik)->pluck('idpet');

        $data = TemuDokter::with(['pet.rasHewan.jenisHewan', 'roleUser.user', 'rekamMedis'])
            ->whereIn('idpet', $petIds)
            ->orderBy('waktu_daftar', 'desc')
            ->get();

        return view('Pemilik.Jadwal.index', compact('data'));
    }

    // Detail jadwal
    public function show($id)
    {
        $user = Auth::user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return redirect()->route('pemilik.dashboard')->with('error', 'Data pemilik tidak ditemukan.');
        }

        $petIds = Pet::where('idpemilik', $pemilik->idpemilik)->pluck('idpet');

        $jadwal = TemuDokter::with(['pet.rasHewan.jenisHewan', 'roleUser.user', 'rekamMedis.dokter', 'rekamMedis.detailRekamMedis.kodeTindakanTerapi'])
            ->whereIn('idpet', $petIds)
            ->where('idreservasi_dokter', $id)
            ->firstOrFail();

        return view('Pemilik.Jadwal.show', compact('jadwal'));
    }
}
