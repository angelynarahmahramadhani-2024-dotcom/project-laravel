@extends('layout.main')

@section('content')
<div class="container mt-5">
  <h2 class="text-center mb-4 fw-bold text-primary">Daftar Ras Hewan 🐶🐱</h2>

  <table class="table table-bordered table-striped shadow-sm">
    <thead class="table-primary">
      <tr>
        <th>ID Ras</th>
        <th>Nama Ras</th>
        <th>Jenis Hewan</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $r)
      <tr>
        <td>{{ $r->idras_hewan }}</td>
        <td>{{ $r->nama_ras }}</td>
        <td>{{ $r->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection