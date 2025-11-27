<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    // Semua pet milik pemilik
    public function index()
    {
        $user = Auth::user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return redirect()->route('pemilik.dashboard')->with('error', 'Data pemilik tidak ditemukan.');
        }

        $data = Pet::with(['rasHewan.jenisHewan'])
            ->where('idpemilik', $pemilik->idpemilik)
            ->orderBy('idpet', 'asc')
            ->get();

        return view('Pemilik.Pet.index', compact('data'));
    }

    // Detail pet
    public function show($id)
    {
        $user = Auth::user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return redirect()->route('pemilik.dashboard')->with('error', 'Data pemilik tidak ditemukan.');
        }

        $pet = Pet::with(['rasHewan.jenisHewan'])
            ->where('idpemilik', $pemilik->idpemilik)
            ->where('idpet', $id)
            ->firstOrFail();

        // Riwayat kunjungan pet ini
        $riwayatKunjungan = TemuDokter::with(['rekamMedis.dokter', 'roleUser.user'])
            ->where('idpet', $id)
            ->orderBy('waktu_daftar', 'desc')
            ->get();

        return view('Pemilik.Pet.show', compact('pet', 'riwayatKunjungan'));
    }
}
