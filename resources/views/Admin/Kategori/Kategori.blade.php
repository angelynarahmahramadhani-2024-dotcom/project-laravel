@extends('layout.main')

@section('content')
<div class="container mt-5">
  <h2 class="text-center mb-4 fw-bold text-primary">Daftar Kategori 🗂️</h2>

  <table class="table table-bordered table-striped shadow-sm">
    <thead class="table-primary">
      <tr>
        <th>ID Kategori</th>
        <th>Nama Kategori</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $k)
      <tr>
        <td>{{ $k->idkategori }}</td>
        <td>{{ $k->nama_kategori }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
