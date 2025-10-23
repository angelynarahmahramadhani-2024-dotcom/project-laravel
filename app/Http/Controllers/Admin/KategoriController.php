<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
     public function index()
    {
        $data = Kategori::all();
        return view('Admin.Kategori.Kategori', compact('data'));
    }
}
