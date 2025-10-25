@extends('layout.main')

@section('title', 'Edit Role RSHP')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold text-primary mb-4">Edit Role</h2>

  <form action="{{ route('role.update', $data->idrole) }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Nama Role</label>
      <input type="text" name="nama_role" value="{{ $data->nama_role }}" class="form-control" required>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">💾 Update</button>
      <a href="{{ route('role.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </div>
  </form>
</div>
@endsection
