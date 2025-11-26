<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        return view('perawat.dashboard_perawat');
    }
}
