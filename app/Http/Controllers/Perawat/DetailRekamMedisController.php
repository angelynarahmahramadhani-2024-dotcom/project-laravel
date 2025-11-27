<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;

class DetailRekamMedisController extends Controller
{
    // Lihat detail rekam medis
    public function show($id)
    {
        $rekamMedis = RekamMedis::with([
            'temuDokter.pet.pemilik.user', 
            'temuDokter.pet.rasHewan.jenisHewan',
            'dokter',
            'detailRekamMedis.kodeTindakanTerapi'
        ])->findOrFail($id);

        return view('Perawat.DetailRekamMedis.show', compact('rekamMedis'));
    }
}
