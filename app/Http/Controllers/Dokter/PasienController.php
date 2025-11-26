<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    // List semua pasien (pet) yang pernah ditangani dokter ini
    public function index()
    {
        $user = Auth::user();
        
        // Ambil idrole_user dokter
        $dokterRoleUser = $user->roleUser()
            ->whereHas('role', function($q) {
                $q->whereRaw('LOWER(nama_role) = ?', ['dokter']);
            })->first();

        $idrole_user = $dokterRoleUser ? $dokterRoleUser->idrole_user : 0;

        // Ambil semua pet yang pernah reservasi ke dokter ini
        $petIds = TemuDokter::where('idrole_user', $idrole_user)
            ->pluck('idpet')
            ->unique();

        $data = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])
            ->whereIn('idpet', $petIds)
            ->get();

        return view('Dokter.Pasien.index', compact('data'));
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

        return view('Dokter.Pasien.show', compact('pet', 'riwayatKunjungan'));
    }
}
