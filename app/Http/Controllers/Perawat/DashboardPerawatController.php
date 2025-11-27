<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use App\Models\RekamMedis;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Statistik
        $totalPasienHariIni = TemuDokter::whereDate('waktu_daftar', today())->count();
        
        $pasienMenunggu = TemuDokter::where('status', 'W')->count();
        
        $pasienDalamProses = TemuDokter::where('status', 'P')->count();
        
        $pasienSelesai = TemuDokter::where('status', 'S')
            ->whereDate('waktu_daftar', today())
            ->count();

        $totalRekamMedis = RekamMedis::count();
        
        $totalPet = Pet::count();

        // Antrian hari ini
        $antrianHariIni = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'roleUser.user', 'rekamMedis'])
            ->whereDate('waktu_daftar', today())
            ->orderBy('no_urut')
            ->limit(10)
            ->get();

        // Rekam medis terbaru
        $rekamMedisTerbaru = RekamMedis::with(['temuDokter.pet.pemilik.user', 'dokter'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('Perawat.dashboard', compact(
            'user',
            'totalPasienHariIni',
            'pasienMenunggu',
            'pasienDalamProses',
            'pasienSelesai',
            'totalRekamMedis',
            'totalPet',
            'antrianHariIni',
            'rekamMedisTerbaru'
        ));
    }
}
