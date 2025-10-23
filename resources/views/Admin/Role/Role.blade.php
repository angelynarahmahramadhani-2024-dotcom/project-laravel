@extends('layout.main')

@section('title', 'Daftar Role | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container text-center">
    <h2 class="fw-bold mb-4" style="color:#2563eb;">🎭 Daftar Role RSHP</h2>

    <div class="table-responsive shadow-lg rounded-4">
      <table class="table table-bordered align-middle">
        <thead style="background:linear-gradient(to right,#60a5fa,#a78bfa,#f472b6); color:white;">
          <tr>
            <th>ID Role</th>
            <th>Nama Role</th>
          </tr>
        </thead>
        <tbody style="background-color:white;">
          @foreach($data as $r)
          <tr>
            <td>{{ $r->idrole }}</td>
            <td>{{ $r->nama_role }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
