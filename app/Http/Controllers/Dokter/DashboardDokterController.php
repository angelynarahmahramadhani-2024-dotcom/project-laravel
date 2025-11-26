<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use App\Models\RekamMedis;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class DashboardDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil idrole_user dokter yang sedang login
        $dokterRoleUser = $user->roleUser()
            ->whereHas('role', function($q) {
                $q->whereRaw('LOWER(nama_role) = ?', ['dokter']);
            })->first();

        $idrole_user = $dokterRoleUser ? $dokterRoleUser->idrole_user : 0;

        // Statistik
        $totalPasienHariIni = TemuDokter::where('idrole_user', $idrole_user)
            ->whereDate('waktu_daftar', today())
            ->count();

        $pasienMenunggu = TemuDokter::where('idrole_user', $idrole_user)
            ->where('status', 'W')
            ->count();

        $pasienSelesai = TemuDokter::where('idrole_user', $idrole_user)
            ->where('status', 'S')
            ->count();

        $totalRekamMedis = RekamMedis::where('dokter_pemeriksa', $user->iduser)->count();

        // Antrian hari ini
        $antrianHariIni = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan'])
            ->where('idrole_user', $idrole_user)
            ->whereDate('waktu_daftar', today())
            ->orderBy('no_urut')
            ->get();

        // Rekam medis terbaru
        $rekamMedisTerbaru = RekamMedis::with(['temuDokter.pet.pemilik.user'])
            ->where('dokter_pemeriksa', $user->iduser)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('Dokter.dashboard_dokter', compact(
            'user',
            'totalPasienHariIni',
            'pasienMenunggu',
            'pasienSelesai',
            'totalRekamMedis',
            'antrianHariIni',
            'rekamMedisTerbaru'
        ));
    }
}
