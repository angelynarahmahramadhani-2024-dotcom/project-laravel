@extends('layout.main')

@section('title', 'Daftar Kategori Klinis | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">🧬 Daftar Kategori Klinis</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
      <a href="{{ route('kategoriKlinis.create') }}" class="btn btn-primary">+ Tambah Kategori Klinis</a>
    </div>

    <table class="table table-bordered table-striped align-middle text-center shadow-sm">
      <thead style="background:linear-gradient(to right,#60a5fa,#a78bfa,#f472b6); color:white;">
        <tr>
          <th>ID</th>
          <th>Nama Kategori Klinis</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody style="background-color:white;">
        @forelse($data as $item)
        <tr>
          <td>{{ $item->idkategori_klinis }}</td>
          <td>{{ $item->nama_kategori_klinis }}</td>
          <td>
            <a href="{{ route('kategoriKlinis.edit', $item->idkategori_klinis) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <a href="{{ route('kategoriKlinis.delete', $item->idkategori_klinis) }}" 
               onclick="return confirm('Yakin mau hapus kategori klinis ini?')" 
               class="btn btn-danger btn-sm">🗑️ Hapus</a>
          </td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-muted">Belum ada data kategori klinis.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@endsection