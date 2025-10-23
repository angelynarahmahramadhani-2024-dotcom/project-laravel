<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $data = RasHewan::with('jenisHewan')->get();
        return view('Admin.RasHewan.RasHewan', compact('data'));
    }
}
