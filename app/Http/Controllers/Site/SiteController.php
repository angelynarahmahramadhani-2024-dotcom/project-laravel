<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('admin.main.home');
    }

    public function layanan()
    {
        return view('admin.main.layanan');
    }

    public function struktur()
    {
        return view('admin.main.struktur');
    }

    public function kontak()
    {
        return view('admin.main.kontak');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function index()
    {
    return view('admin.jenishewan.jenishewan'); 
    }

    public function pemilik()
    {
        return view('admin.pemilik.pemilik'); 
    }

    public function RasHewan()
    {
        return view('admin.RasHewan.RasHewan'); 
    }

    public function Kategori()
    {
        return view('Admin.Kategori.Kategori'); 
    }

    public function KategoriKlinis()
    {
        return view('Admin.KategoriKlinis.KategoriKlinis'); 
    }

    public function KodeTindakanTerapi()
    {
        return view('Admin.KodeTindakanTerapi.KodeTindakanTerapi'); 
    }

    public function pet()
    {
        return view('Admin.Pet.Pet'); 
    }

    public function Role()
    {
        return view('Admin.Role.Role'); 
    }

    public function RoleUser()
    {
        return view('Admin.User.User'); 
    }
    
    public function cekkoneksi()
    {
        try {
            \DB::connection()->getPdo();
            return "Koneksi database berhasil!";
        } catch (\Exception $e) {
            return "Koneksi database gagal: " . $e->getMessage();
        }
    }
}
