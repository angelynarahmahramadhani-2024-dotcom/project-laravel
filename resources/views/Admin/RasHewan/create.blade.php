@extends('layout.main')

@section('title', 'Tambah Ras Hewan')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">Tambah Ras Hewan 🐾</h2>

  <form action="{{ route('rashewan.store') }}" method="POST" class="mx-auto" style="max-width:500px;">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Ras Hewan</label>
      <input type="text" name="nama_ras" class="form-control" placeholder="Masukkan nama ras..." required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Jenis Hewan</label>
      <select name="idjenis_hewan" class="form-select" required>
        <option value="">-- Pilih Jenis Hewan --</option>
        @foreach($jenis as $j)
          <option value="{{ $j->idjenis_hewan }}">{{ $j->nama_jenis_hewan }}</option>
        @endforeach
      </select>
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('rashewan.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
      <button type="submit" class="btn btn-primary">💾 Simpan</button>
    </div>
  </form>
</div>
@endsection
