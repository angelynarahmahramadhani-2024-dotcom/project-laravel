@extends('layout.main')

@section('title', 'Edit Jenis Hewan')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">Edit Jenis Hewan 🐾</h2>

  <form action="{{ route('jenishewan.update', $jenis->idjenis_hewan) }}" method="POST" class="mx-auto" style="max-width:500px;">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Jenis Hewan</label>
      <input type="text" name="nama_jenis_hewan" value="{{ $jenis->nama_jenis_hewan }}" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('jenishewan.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection