<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;

class PemilikController extends Controller
{
    public function index()
    {
        $data = Pemilik::with('user')->get();
        return view('Admin.pemilik.pemilik', compact('data'));
    }

    public function create()
    {
        $users = User::all();
        return view('Admin.pemilik.create', compact('users'));
    }

    public function store(Request $request)
    {
        // VALIDASI
        $validated = $this->validatePemilik($request);

        // FORMAT
        $validated['alamat'] = $this->formatAlamat($validated['alamat']);
        $validated['no_wa'] = $this->formatNomorWa($validated['no_wa']);

        // CREATE VIA HELPER
        $this->createPemilik($validated);

        return redirect()->route('admin.pemilik.index')
            ->with('success', '✅ Data pemilik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $users = User::all();
        return view('Admin.pemilik.edit', compact('pemilik', 'users'));
    }

    public function update(Request $request, $id)
    {
        // VALIDASI
        $validated = $this->validatePemilik($request);

        // FORMAT
        $validated['alamat'] = $this->formatAlamat($validated['alamat']);
        $validated['no_wa'] = $this->formatNomorWa($validated['no_wa']);

        $pemilik = Pemilik::findOrFail($id);
        $pemilik->update($validated);

        return redirect()->route('admin.pemilik.index')
            ->with('success', '✏️ Data pemilik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pemilik::findOrFail($id)->delete();
        return redirect()->route('admin.pemilik.index')
            ->with('success', '🗑️ Data pemilik berhasil dihapus!');
    }

    /* ============================================================
        VALIDASI (WAJIB SESUAI MODUL 11)
    ============================================================ */
    private function validatePemilik($request)
    {
        return $request->validate([
            'no_wa' => 'required|string|max:45',
            'alamat' => 'required|string|max:100',
            'iduser' => 'required|integer|exists:user,iduser',
        ]);
    }

    /* ============================================================
        HELPER INSERT DATA
    ============================================================ */
    private function createPemilik($data)
    {
        $nextId = Pemilik::max('idpemilik') + 1;

        Pemilik::create([
            'idpemilik' => $nextId,
            'no_wa' => $data['no_wa'],
            'alamat' => $data['alamat'],
            'iduser' => $data['iduser'],
        ]);
    }

    /* ============================================================
        HELPER FORMAT DATA
    ============================================================ */
    private function formatAlamat($text)
    {
        return ucwords(strtolower($text));
    }

    private function formatNomorWa($no)
    {
        return preg_replace('/\s+/', '', $no); // hapus spasi
    }
}
