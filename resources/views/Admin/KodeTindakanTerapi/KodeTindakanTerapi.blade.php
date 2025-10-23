@extends('layout.main')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container text-center">
    <h2 class="fw-bold mb-4" style="color:#2563eb;">💉 Daftar Kode Tindakan Terapi RSHP</h2>

    <div class="table-responsive shadow-lg rounded-4">
      <table class="table table-bordered align-middle">
        <thead style="background:linear-gradient(to right,#60a5fa,#a78bfa,#f472b6); color:white;">
          <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Deskripsi Tindakan</th>
            <th>Kategori</th>
            <th>Kategori Klinis</th>
          </tr>
        </thead>
        <tbody style="background-color:white;">
          @foreach($data as $item)
          <tr>
            <td>{{ $item->idkode_tindakan_terapi }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->deskripsi_tindakan_terapi }}</td>
            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
            <td>{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
