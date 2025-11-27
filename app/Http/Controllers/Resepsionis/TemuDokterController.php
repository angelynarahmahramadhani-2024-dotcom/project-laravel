<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temuDokters = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'roleUser.user', 'roleUser.role'])
            ->orderBy('waktu_daftar', 'desc')
            ->get();
        return view('Resepsionis.TemuDokter.index', compact('temuDokters'));
    }

    public function create()
    {
        $pets = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])->get();
        // Ambil dokter yang aktif (role_user dengan role dokter dan status aktif)
        $dokters = RoleUser::with('user')
            ->whereHas('role', function($q) {
                $q->where('nama_role', 'Dokter');
            })
            ->where('status', 1)
            ->get();
        
        return view('Resepsionis.TemuDokter.create', compact('pets', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required|exists:pet,idpet',
            'idrole_user' => 'required|exists:role_user,idrole_user',
            'keluhan' => 'nullable|string|max:1000',
        ]);

        // Generate no urut untuk hari ini
        $today = Carbon::today();
        $lastNoUrut = TemuDokter::whereDate('waktu_daftar', $today)->max('no_urut') ?? 0;
        $noUrut = $lastNoUrut + 1;

        TemuDokter::create([
            'no_urut' => $noUrut,
            'waktu_daftar' => Carbon::now(),
            'status' => 'W', // W = Menunggu
            'keluhan' => $request->keluhan,
            'idpet' => $request->idpet,
            'idrole_user' => $request->idrole_user,
        ]);

        return redirect()->route('resepsionis.temudokter.index')
            ->with('success', 'Pendaftaran berhasil! No. Antrian: ' . $noUrut);
    }

    public function show($id)
    {
        $temuDokter = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'roleUser.user', 'rekamMedis'])
            ->findOrFail($id);
        return view('Resepsionis.TemuDokter.show', compact('temuDokter'));
    }

    public function edit($id)
    {
        $temuDokter = TemuDokter::findOrFail($id);
        $pets = Pet::with(['pemilik.user', 'rasHewan.jenisHewan'])->get();
        $dokters = RoleUser::with('user')
            ->whereHas('role', function($q) {
                $q->where('nama_role', 'Dokter');
            })
            ->where('status', 1)
            ->get();
        
        return view('Resepsionis.TemuDokter.edit', compact('temuDokter', 'pets', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idpet' => 'required|exists:pet,idpet',
            'idrole_user' => 'required|exists:role_user,idrole_user',
            'status' => 'required|in:W,P,S,B',
            'keluhan' => 'nullable|string|max:1000',
        ]);

        $temuDokter = TemuDokter::findOrFail($id);
        $temuDokter->update([
            'idpet' => $request->idpet,
            'idrole_user' => $request->idrole_user,
            'status' => $request->status,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()->route('resepsionis.temudokter.index')
            ->with('success', 'Data reservasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $temuDokter = TemuDokter::findOrFail($id);
        
        // Cek apakah sudah ada rekam medis
        if ($temuDokter->rekamMedis) {
            return redirect()->route('resepsionis.temudokter.index')
                ->with('error', 'Tidak dapat menghapus! Reservasi sudah memiliki rekam medis.');
        }
        
        $temuDokter->delete();

        return redirect()->route('resepsionis.temudokter.index')
            ->with('success', 'Data reservasi berhasil dihapus!');
    }

    // Update status cepat
    public function updateStatus($id, $status)
    {
        $temuDokter = TemuDokter::findOrFail($id);
        
        if (!in_array($status, ['W', 'P', 'S', 'B'])) {
            return redirect()->back()->with('error', 'Status tidak valid!');
        }
        
        $temuDokter->update(['status' => $status]);
        
        return redirect()->back()->with('success', 'Status berhasil diupdate!');
    }

    // Antrian hari ini
    public function antrian()
    {
        $today = Carbon::today();
        $antrian = TemuDokter::with(['pet.pemilik.user', 'pet.rasHewan.jenisHewan', 'roleUser.user'])
            ->whereDate('waktu_daftar', $today)
            ->orderBy('no_urut', 'asc')
            ->get();
        
        return view('Resepsionis.TemuDokter.antrian', compact('antrian'));
    }
}
