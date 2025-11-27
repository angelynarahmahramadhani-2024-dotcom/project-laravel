<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    // List semua rekam medis milik dokter ini (VIEW ONLY)
    public function index()
    {
        $user = Auth::user();

        $data = RekamMedis::with(['temuDokter.pet.pemilik.user', 'temuDokter.pet.rasHewan', 'dokter', 'detailRekamMedis'])
            ->where('dokter_pemeriksa', $user->iduser)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Dokter.RekamMedis.index', compact('data'));
    }

    // Detail rekam medis (View Only untuk RM, tapi bisa CRUD Detail/Tindakan)
    public function show($id)
    {
        $rekamMedis = RekamMedis::with([
            'temuDokter.pet.pemilik.user', 
            'temuDokter.pet.rasHewan.jenisHewan',
            'dokter',
            'detailRekamMedis.kodeTindakanTerapi'
        ])->findOrFail($id);

        return view('Dokter.RekamMedis.show', compact('rekamMedis'));
    }
}
