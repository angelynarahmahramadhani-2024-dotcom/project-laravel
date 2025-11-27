<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;

class AntrianController extends Controller
{
    // List semua antrian hari ini
    public function index()
    {
        $antrianHariIni = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'roleUser.user', 'rekamMedis'])
            ->whereDate('waktu_daftar', today())
            ->orderBy('no_urut')
            ->get();

        // Statistik
        $totalAntrian = $antrianHariIni->count();
        $menunggu = $antrianHariIni->where('status', 'W')->count();
        $proses = $antrianHariIni->where('status', 'P')->count();
        $selesai = $antrianHariIni->where('status', 'S')->count();

        return view('Perawat.Antrian.index', compact(
            'antrianHariIni',
            'totalAntrian',
            'menunggu',
            'proses',
            'selesai'
        ));
    }

    // Semua reservasi (history)
    public function history(Request $request)
    {
        $query = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'roleUser.user', 'rekamMedis']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('waktu_daftar', $request->tanggal);
        }

        $data = $query->orderBy('waktu_daftar', 'desc')->get();

        return view('Perawat.Antrian.history', compact('data'));
    }
}
