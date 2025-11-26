<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\JenisHewan;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with(['pemilik.user', 'jenisHewan', 'rasHewan'])
            ->orderBy('idpet', 'desc')
            ->get();
        return view('Resepsionis.Pet.index', compact('pets'));
    }

    public function create()
    {
        $pemiliks = Pemilik::with('user')->get();
        $jenisHewans = JenisHewan::all();
        return view('Resepsionis.Pet.create', compact('pemiliks', 'jenisHewans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
            'idras_hewan' => 'nullable|exists:ras_hewan,idras_hewan',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'warna' => 'nullable|string|max:100',
        ]);

        Pet::create([
            'nama' => $request->nama,
            'idpemilik' => $request->idpemilik,
            'idjenis_hewan' => $request->idjenis_hewan,
            'idras_hewan' => $request->idras_hewan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna' => $request->warna,
        ]);

        return redirect()->route('resepsionis.pet.index')
            ->with('success', 'Data pet berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $pemiliks = Pemilik::with('user')->get();
        $jenisHewans = JenisHewan::all();
        return view('Resepsionis.Pet.edit', compact('pet', 'pemiliks', 'jenisHewans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
            'idras_hewan' => 'nullable|exists:ras_hewan,idras_hewan',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'warna' => 'nullable|string|max:100',
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update([
            'nama' => $request->nama,
            'idpemilik' => $request->idpemilik,
            'idjenis_hewan' => $request->idjenis_hewan,
            'idras_hewan' => $request->idras_hewan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna' => $request->warna,
        ]);

        return redirect()->route('resepsionis.pet.index')
            ->with('success', 'Data pet berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        
        // Cek apakah pet punya reservasi
        if ($pet->temuDokter()->count() > 0) {
            return redirect()->route('resepsionis.pet.index')
                ->with('error', 'Tidak dapat menghapus! Pet masih memiliki riwayat kunjungan.');
        }
        
        $pet->delete();

        return redirect()->route('resepsionis.pet.index')
            ->with('success', 'Data pet berhasil dihapus!');
    }

    // API untuk get ras berdasarkan jenis hewan
    public function getRasByJenis($idJenisHewan)
    {
        $ras = RasHewan::where('idjenis_hewan', $idJenisHewan)->get();
        return response()->json($ras);
    }
}
