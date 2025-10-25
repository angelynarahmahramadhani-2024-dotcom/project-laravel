@extends('layout.main')

@section('title', 'Daftar Role RSHP')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold text-primary mb-4">🧩 Daftar Role RSHP</h2>

  <div class="text-end mb-3">
    <a href="{{ route('role.create') }}" class="btn btn-primary">+ Tambah Role</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered text-center align-middle shadow-sm bg-white">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>Nama Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $item)
      <tr>
        <td>{{ $item->idrole }}</td>
        <td>{{ $item->nama_role }}</td>
        <td>
          <a href="{{ route('role.edit', $item->idrole) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
          <a href="{{ route('role.delete', $item->idrole) }}" onclick="return confirm('Yakin ingin hapus role ini?')" class="btn btn-danger btn-sm">🗑 Hapus</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection