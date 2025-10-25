@extends('layout.main')

@section('title', 'Tambah Kode Tindakan')

@section('content')
<div class="container py-5">
  <h3 class="fw-bold text-center mb-4">Tambah Kode Tindakan</h3>

  <form action="{{ route('KodeTindakanTerapi.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Kode</label>
      <input type="text" name="kode" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi_tindakan_terapi" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Kategori</label>
      <select name="idkategori" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $k)
          <option value="{{ $k->idkategori }}">{{ $k->nama_kategori }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Kategori Klinis</label>
      <select name="idkategori_klinis" class="form-select" required>
        <option value="">-- Pilih Kategori Klinis --</option>
        @foreach($kategoriKlinis as $kk)
          <option value="{{ $kk->idkategori_klinis }}">{{ $kk->nama_kategori_klinis }}</option>
        @endforeach
      </select>
    </div>

    <div class="text-end">
      <a href="{{ route('KodeTindakanTerapi.index') }}" class="btn btn-secondary">Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    @if(session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif

  </form>
</div>
@endsection