<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Mengambil data statistik menggunakan Query Builder
        $jumlahPet = DB::table('pet')->count();
        $jumlahPemilik = DB::table('pemilik')->count();
        $jumlahJenis = DB::table('jenis_hewan')->count();
        $jumlahKategori = DB::table('kategori')->count();
        
        return view('Admin.dashboard_admin', compact(
            'jumlahPet',
            'jumlahPemilik',
            'jumlahJenis',
            'jumlahKategori'
        ));
    }
}
