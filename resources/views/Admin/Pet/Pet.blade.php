@extends('layout.main')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container text-center">
    <h2 class="fw-bold mb-4" style="color:#2563eb;">🐾 Daftar Hewan Peliharaan RSHP</h2>

    <div class="table-responsive shadow-lg rounded-4">
      <table class="table table-bordered align-middle">
        <thead style="background:linear-gradient(to right,#60a5fa,#a78bfa,#f472b6); color:white;">
          <tr>
            <th>ID</th>
            <th>Nama Hewan</th>
            <th>Tanggal Lahir</th>
            <th>Warna / Tanda</th>
            <th>Jenis Kelamin</th>
            <th>Ras Hewan</th>
            <th>Pemilik</th>
          </tr>
        </thead>
        <tbody style="background-color:white;">
          @foreach($data as $p)
          <tr>
            <td>{{ $p->idpet }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->tanggal_lahir }}</td>
            <td>{{ $p->warna_tanda }}</td>
            <td>
              @if($p->jenis_kelamin == 'L')
                Jantan ♂
              @elseif($p->jenis_kelamin == 'P')
                Betina ♀
              @else
                -
              @endif
            </td>
            <td>{{ $p->rasHewan->nama_ras ?? '-' }}</td>
            <td>{{ $p->pemilik->user->name ?? '-' }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
