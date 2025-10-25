@extends('layout.main')

@section('title', 'Edit Kode Tindakan')

@section('content')
<div class="container py-5">
  <h3 class="fw-bold text-center mb-4">Edit Kode Tindakan</h3>

  <form action="{{ route('KodeTindakanTerapi.update', $data->idkode_tindakan_terapi) }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Kode</label>
      <input type="text" name="kode" value="{{ $data->kode }}" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi_tindakan_terapi" class="form-control" required>{{ $data->deskripsi_tindakan_terapi }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Kategori</label>
      <select name="idkategori" class="form-select" required>
        @foreach($kategori as $k)
          <option value="{{ $k->idkategori }}" {{ $data->idkategori == $k->idkategori ? 'selected' : '' }}>
            {{ $k->nama_kategori }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Kategori Klinis</label>
      <select name="idkategori_klinis" class="form-select" required>
        @foreach($kategoriKlinis as $kk)
          <option value="{{ $kk->idkategori_klinis }}" {{ $data->idkategori_klinis == $kk->idkategori_klinis ? 'selected' : '' }}>
            {{ $kk->nama_kategori_klinis }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="text-end">
      <a href="{{ route('KodeTindakanTerapi.index') }}" class="btn btn-secondary">Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection