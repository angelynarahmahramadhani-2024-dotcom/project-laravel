<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    // Get idrole_user dokter yang login
    private function getDokterRoleUserId()
    {
        $user = Auth::user();
        $dokterRoleUser = $user->roleUser()
            ->whereHas('role', function($q) {
                $q->whereRaw('LOWER(nama_role) = ?', ['dokter']);
            })->first();

        return $dokterRoleUser ? $dokterRoleUser->idrole_user : 0;
    }

    // List antrian hari ini untuk dokter ini
    public function index()
    {
        $idrole_user = $this->getDokterRoleUserId();

        $antrianHariIni = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'rekamMedis'])
            ->where('idrole_user', $idrole_user)
            ->whereDate('waktu_daftar', today())
            ->orderBy('no_urut')
            ->get();

        // Statistik
        $totalAntrian = $antrianHariIni->count();
        $menunggu = $antrianHariIni->where('status', 'W')->count();
        $proses = $antrianHariIni->where('status', 'P')->count();
        $selesai = $antrianHariIni->where('status', 'S')->count();

        return view('Dokter.Antrian.index', compact(
            'antrianHariIni',
            'totalAntrian',
            'menunggu',
            'proses',
            'selesai'
        ));
    }

    // Riwayat semua reservasi untuk dokter ini
    public function history(Request $request)
    {
        $idrole_user = $this->getDokterRoleUserId();

        $query = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'rekamMedis'])
            ->where('idrole_user', $idrole_user);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('waktu_daftar', $request->tanggal);
        }

        $data = $query->orderBy('waktu_daftar', 'desc')->get();

        return view('Dokter.Antrian.history', compact('data'));
    }
}
