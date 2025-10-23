<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $data = Pet::with(['pemilik', 'rasHewan'])->get();
        return view('admin.pet.pet', compact('data'));
    }
}
