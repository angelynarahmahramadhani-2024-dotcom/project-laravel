@extends('layout.main')

@section('title', 'Daftar Ras Hewan')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">🐾 Daftar Ras Hewan</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
      <a href="{{ route('rashewan.create') }}" class="btn btn-primary">+ Tambah Ras Hewan</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
      <thead class="table-primary text-center">
        <tr>
          <th>ID</th>
          <th>Nama Ras</th>
          <th>Jenis Hewan</th>
          <th width="20%">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach($data as $item)
        <tr>
          <td>{{ $item->idras_hewan }}</td>
          <td>{{ $item->nama_ras }}</td>
          <td>{{ $item->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
          <td>
            <a href="{{ route('rashewan.edit', $item->idras_hewan) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <a href="{{ route('rashewan.delete', $item->idras_hewan) }}" 
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