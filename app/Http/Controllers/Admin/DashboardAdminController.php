<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard_admin');
    }
}
