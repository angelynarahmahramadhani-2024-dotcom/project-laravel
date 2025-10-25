@extends('layout.main')

@section('title', 'Daftar Pemilik Hewan')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">🐾 Daftar Pemilik Hewan</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
      <a href="{{ route('pemilik.create') }}" class="btn btn-primary">+ Tambah Pemilik</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
      <thead class="table-primary text-center">
        <tr>
          <th>ID</th>
          <th>Nama User</th>
          <th>Alamat</th>
          <th>No. WA</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach($data as $item)
        <tr>
          <td>{{ $item->idpemilik }}</td>
          <td>{{ $item->user->nama ?? '-' }}</td>
          <td>{{ $item->alamat }}</td>
          <td>{{ $item->no_wa }}</td>
          <td>
            <a href="{{ route('pemilik.edit', $item->idpemilik) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <a href="{{ route('pemilik.delete', $item->idpemilik) }}" 
               onclick="return confirm('Yakin mau hapus data ini?')" 
               class="btn btn-danger btn-sm">🗑️ Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection