<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class RoleUserController extends Controller
{
    public function index()
    {
        // Ambil semua user + role dari relasi role_user + role
        $data = User::with(['roleUser.role'])->get();
        return view('Admin.User.User', compact('data'));
    }
}