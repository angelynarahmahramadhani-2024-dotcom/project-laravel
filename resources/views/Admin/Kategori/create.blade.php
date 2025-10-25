@extends('layout.main')

@section('title', 'Tambah Kategori | RSHP UNAIR')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">Tambah Kategori 🐾</h2>

  <form action="{{ route('kategori.store') }}" method="POST" class="mx-auto" style="max-width:500px;">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Kategori</label>
      <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori..." required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('kategori.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
      <button type="submit" class="btn btn-primary">💾 Simpan</button>
    </div>
  </form>
</div>
@endsection
