<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\TemuDokter;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Auth;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data pemilik berdasarkan user login
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();
        
        if (!$pemilik) {
            return view('Pemilik.dashboard', compact('user'))->with('error', 'Data pemilik tidak ditemukan.');
        }

        // Jumlah pet yang dimiliki
        $totalPet = Pet::where('idpemilik', $pemilik->idpemilik)->count();

        // Ambil semua pet milik pemilik
        $petIds = Pet::where('idpemilik', $pemilik->idpemilik)->pluck('idpet');

        // Jadwal temu dokter hari ini
        $jadwalHariIni = TemuDokter::with(['pet.rasHewan.jenisHewan', 'roleUser.user'])
            ->whereIn('idpet', $petIds)
            ->whereDate('waktu_daftar', today())
            ->orderBy('no_urut')
            ->get();

        // Jadwal temu dokter mendatang (upcoming)
        $jadwalMendatang = TemuDokter::with(['pet.rasHewan.jenisHewan', 'roleUser.user'])
            ->whereIn('idpet', $petIds)
            ->where('status', 'W')
            ->orderBy('waktu_daftar', 'asc')
            ->limit(5)
            ->get();

        // Total kunjungan
        $totalKunjungan = TemuDokter::whereIn('idpet', $petIds)->count();

        // Total rekam medis
        $rekamMedisIds = TemuDokter::whereIn('idpet', $petIds)->pluck('idreservasi_dokter');
        $totalRekamMedis = RekamMedis::whereIn('idreservasi_dokter', $rekamMedisIds)->count();

        // Rekam medis terbaru
        $rekamMedisTerbaru = RekamMedis::with(['temuDokter.pet', 'dokter'])
            ->whereIn('idreservasi_dokter', $rekamMedisIds)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Pets dengan info
        $pets = Pet::with(['rasHewan.jenisHewan'])
            ->where('idpemilik', $pemilik->idpemilik)
            ->get();

        return view('Pemilik.dashboard', compact(
            'user',
            'pemilik',
            'totalPet',
            'totalKunjungan',
            'totalRekamMedis',
            'jadwalHariIni',
            'jadwalMendatang',
            'rekamMedisTerbaru',
            'pets'
        ));
    }
}
