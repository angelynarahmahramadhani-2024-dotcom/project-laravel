<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\JenisHewan;
use App\Models\RekamMedis;
use App\Models\Aktivitas;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPet = Pet::count();
        $jumlahPemilik = Pemilik::count();
        $jumlahJenis = JenisHewan::count();
        $jumlahRekam = RekamMedis::count();

        $aktivitas = Aktivitas::latest()->take(5)->get(); // ambil 5 aktivitas terakhir

        return view('admin.dashboard', compact(
            'jumlahPet', 'jumlahPemilik', 'jumlahJenis', 'jumlahRekam', 'aktivitas'
        ));
    }
}
