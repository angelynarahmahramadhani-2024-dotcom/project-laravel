<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $data = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('Admin.KodeTindakanTerapi.KodeTindakanTerapi', compact('data'));
    }
}
