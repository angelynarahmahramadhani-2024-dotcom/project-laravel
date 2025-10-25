@extends('layout.main')

@section('title', 'Kode Tindakan Terapi | RSHP UNAIR')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold text-center mb-4 text-primary">💉 Daftar Kode Tindakan Terapi</h2>

  @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
  @endif

  <div class="text-end mb-3">
    <a href="{{ route('KodeTindakanTerapi.create') }}" class="btn btn-primary">+ Tambah Kode Tindakan</a>
  </div>

  <table class="table table-bordered table-striped align-middle text-center shadow-sm">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>Kode</th>
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Kategori Klinis</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($data as $item)
      <tr>
        <td>{{ $item->idkode_tindakan_terapi }}</td>
        <td>{{ $item->kode }}</td>
        <td>{{ $item->deskripsi_tindakan_terapi }}</td>
        <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
        <td>{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
        <td>
          <a href="{{ route('KodeTindakanTerapi.edit', $item->idkode_tindakan_terapi) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
          <a href="{{ route('KodeTindakanTerapi.delete', $item->idkode_tindakan_terapi) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">🗑️ Hapus</a>
        </td>
      </tr>
      @empty
      <tr><td colspan="6">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
