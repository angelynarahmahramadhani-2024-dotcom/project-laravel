<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        $data = JenisHewan::all();
        return view('admin.jenishewan.jenishewan', compact('data'));
    }
}