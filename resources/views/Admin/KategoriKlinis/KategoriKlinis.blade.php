@extends('layout.main')

@section('content')
<div class="container mt-5">
  <h2 class="text-center mb-4 fw-bold text-primary">Daftar Kategori Klinis 🧬</h2>

  <table class="table table-bordered table-striped shadow-sm">
    <thead class="table-primary">
      <tr>
        <th>ID Kategori Klinis</th>
        <th>Nama Kategori Klinis</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $kk)
      <tr>
        <td>{{ $kk->idkategori_klinis }}</td>
        <td>{{ $kk->nama_kategori_klinis }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
