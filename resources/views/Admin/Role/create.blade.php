@extends('layout.main')

@section('title', 'Tambah Role RSHP')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold text-primary mb-4">Tambah Role Baru</h2>

  <form action="{{ route('role.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Nama Role</label>
      <input type="text" name="nama_role" class="form-control" required>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">💾 Simpan</button>
      <a href="{{ route('role.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </div>
  </form>
</div>
@endsection
