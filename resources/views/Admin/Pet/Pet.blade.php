@extends('layout.main')

@section('title', 'Daftar Hewan Peliharaan RSHP')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold text-primary mb-4">🐾 Daftar Hewan Peliharaan RSHP</h2>

  <div class="text-end mb-3">
    <a href="{{ route('pet.create') }}" class="btn btn-primary">+ Tambah Hewan</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered text-center align-middle shadow-sm bg-white">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Warna/Tanda</th>
        <th>Jenis Kelamin</th>
        <th>Ras Hewan</th>
        <th>Pemilik</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $item)
      <tr>
        <td>{{ $item->idpet }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->tanggal_lahir }}</td>
        <td>{{ $item->warna_tanda }}</td>
        <td>{{ $item->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</td>
        <td>{{ $item->rasHewan->nama_ras ?? '-' }}</td>
        <td>{{ $item->pemilik->user->nama ?? '-' }}</td>
        <td>
          <a href="{{ route('pet.edit', $item->idpet) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
          <a href="{{ route('pet.delete', $item->idpet) }}" onclick="return confirm('Yakin ingin hapus data ini?')" class="btn btn-danger btn-sm">🗑 Hapus</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection