<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    // List semua pasien (pet)
    public function index()
    {
        $data = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])
            ->orderBy('idpet', 'asc')
            ->get();

        return view('Perawat.Pasien.index', compact('data'));
    }

    // Detail pasien
    public function show($id)
    {
        $pet = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])->findOrFail($id);
        
        // Riwayat kunjungan pet ini
        $riwayatKunjungan = TemuDokter::with(['rekamMedis.dokter', 'roleUser.user'])
            ->where('idpet', $id)
            ->orderBy('waktu_daftar', 'desc')
            ->get();

        return view('Perawat.Pasien.show', compact('pet', 'riwayatKunjungan'));
    }
}
