@extends('layout.main')

@section('title', 'Tambah Jenis Hewan | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container" style="max-width:600px;">
    <div class="card shadow p-4 rounded-4">
      <h3 class="fw-bold text-center mb-3 text-primary">Tambah Jenis Hewan 🐾</h3>

      <form action="{{ route('jenishewan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_jenis_hewan" class="form-label">Nama Jenis Hewan</label>
          <input type="text" name="nama_jenis_hewan" id="nama_jenis_hewan" class="form-control" placeholder="Masukkan nama jenis hewan..." required>
        </div>

        <div class="text-end">
          <a href="{{ route('jenishewan.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
          <button type="submit" class="btn btn-primary">💾 Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection