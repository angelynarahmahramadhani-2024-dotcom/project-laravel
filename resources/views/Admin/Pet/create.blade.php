@extends('layout.main')

@section('title', 'Tambah Hewan Peliharaan')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold text-primary mb-4">Tambah Hewan Peliharaan</h2>

  <form action="{{ route('pet.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Nama Hewan</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="form-control">
    </div>

    <div class="mb-3">
      <label>Warna / Tanda</label>
      <input type="text" name="warna_tanda" class="form-control">
    </div>

    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L">Jantan ♂</option>
        <option value="P">Betina ♀</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Pilih Pemilik</label>
      <select name="idpemilik" class="form-control" required>
        <option value="">-- Pilih Pemilik --</option>
        @foreach($pemilik as $p)
          <option value="{{ $p->idpemilik }}">{{ $p->user->nama ?? 'Nama tidak tersedia' }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Pilih Ras Hewan</label>
      <select name="idras_hewan" class="form-control" required>
        <option value="">-- Pilih Ras --</option>
        @foreach($ras as $r)
          <option value="{{ $r->idras_hewan }}">{{ $r->nama_ras }}</option>
        @endforeach
      </select>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">💾 Simpan</button>
      <a href="{{ route('pet.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </div>
  </form>
</div>
@endsection