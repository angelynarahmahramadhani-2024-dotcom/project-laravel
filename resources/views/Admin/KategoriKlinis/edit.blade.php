@extends('layout.main')

@section('title', 'Edit Kategori Klinis | RSHP UNAIR')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">Edit Kategori Klinis 🧬</h2>

  <form action="{{ route('kategoriKlinis.update', $data->idkategori_klinis) }}" method="POST" class="mx-auto" style="max-width:500px;">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Kategori Klinis</label>
      <input type="text" name="nama_kategori_klinis" value="{{ $data->nama_kategori_klinis }}" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('kategoriKlinis.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection