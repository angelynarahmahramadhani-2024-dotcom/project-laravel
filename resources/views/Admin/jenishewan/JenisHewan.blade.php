@extends('layout.main')

@section('title', 'Daftar Jenis Hewan')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container">
    <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">🐾 Daftar Jenis Hewan</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
      <a href="{{ route('jenishewan.create') }}" class="btn btn-primary">+ Tambah Jenis Hewan</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
      <thead class="table-primary text-center">
        <tr>
          <th>ID</th>
          <th>Nama Jenis Hewan</th>
          <th width="20%">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach($data as $item)
        <tr>
          <td>{{ $item->idjenis_hewan }}</td>
          <td>{{ $item->nama_jenis_hewan }}</td>
          <td>
            <a href="{{ route('jenishewan.edit', $item->idjenis_hewan) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <a href="{{ route('jenishewan.delete', $item->idjenis_hewan) }}" 
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