<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\Pemilik;
use Carbon\Carbon;

class DashboardResepsionisController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        
        // Statistik
        $totalPemilik = Pemilik::count();
        $totalPet = Pet::count();
        $antrianHariIni = TemuDokter::whereDate('waktu_daftar', $today)->count();
        $antrianMenunggu = TemuDokter::whereDate('waktu_daftar', $today)->where('status', 'W')->count();
        
        // Antrian hari ini
        $antrian = TemuDokter::with(['pet.pemilik', 'pet.rasHewan.jenisHewan', 'roleUser.user'])
            ->whereDate('waktu_daftar', $today)
            ->orderBy('no_urut', 'asc')
            ->get();
        
        // Pendaftaran terbaru
        $pendaftaranTerbaru = TemuDokter::with(['pet.pemilik'])
            ->orderBy('waktu_daftar', 'desc')
            ->limit(5)
            ->get();
        
        return view('Resepsionis.dashboard_resepsionis', compact(
            'totalPemilik',
            'totalPet',
            'antrianHariIni',
            'antrianMenunggu',
            'antrian',
            'pendaftaranTerbaru'
        ));
    }
}
