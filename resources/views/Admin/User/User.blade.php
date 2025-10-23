@extends('layout.main')

@section('title', 'Daftar User | RSHP UNAIR')

@section('content')
<section class="py-5" style="background-color:#fffaf5;">
  <div class="container text-center">
    <h2 class="fw-bold mb-4" style="color:#2563eb;">👥 Daftar User & Role RSHP</h2>

    <div class="table-responsive shadow-lg rounded-4">
      <table class="table table-bordered align-middle">
        <thead style="background:linear-gradient(to right,#60a5fa,#a78bfa,#f472b6); color:white;">
          <tr>
            <th>ID User</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody style="background-color:white;">
          @foreach($data as $u)
          <tr>
            <td>{{ $u->iduser }}</td>
            <td>{{ $u->nama }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->roleUser->role->nama_role ?? '-' }}</td>
            <td>
              @if(isset($u->roleUser) && $u->roleUser->status == 1)
                Aktif ✅
              @else
                Nonaktif ❌
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
