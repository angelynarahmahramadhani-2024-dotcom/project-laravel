@extends('layout.main')

@section('title', 'Manajemen Role User | RSHP UNAIR')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold text-primary mb-4">⚙️ Manajemen Role User RSHP</h2>

  @if(session('success'))
    <div class="alert alert-success text-center rounded-4">{{ session('success') }}</div>
  @endif

  <div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
      <table class="table table-bordered align-middle text-center mb-0">
        <thead class="table-primary">
          <tr>
            <th style="width: 10%">ID User</th>
            <th style="width: 15%">Nama</th>
            <th style="width: 25%">Email</th>
            <th style="width: 35%">Role & Status</th>
            <th style="width: 15%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td class="fw-semibold">{{ $user->iduser }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>

            <td>
              <!-- Daftar Role Aktif -->
            <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
             @forelse($user->roleUser as $r)
               @if($r->role)
            <span class="badge text-black fw-semibold px-3 py-2 
           @if(strtolower($r->role->nama_role) == 'administrator') bg-admin
           @elseif(strtolower($r->role->nama_role) == 'dokter') bg-dokter
           @elseif(strtolower($r->role->nama_role) == 'perawat') bg-perawat
           @elseif(strtolower($r->role->nama_role) == 'resepsionis') bg-resepsionis
           @endif">
          {{ $r->role->nama_role }}
          </span>

             @else
             <span class="text-muted">(Role tidak ditemukan)</span>
            @endif
            @empty
            <span class="text-muted">Belum punya role</span>
            @endforelse
            </div>


              <!-- Form Tambah Role -->
              <form action="{{ route('roleuser.store') }}" method="POST" 
                    class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                @csrf
                <input type="hidden" name="iduser" value="{{ $user->iduser }}">
                <select name="idrole" class="form-select form-select-sm border-pink" style="width:130px;">
                  <option value="">Pilih Role</option>
                  @foreach($roles as $role)
                    <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                  @endforeach
                </select>
                <select name="status" class="form-select form-select-sm border-pink" style="width:100px;">
                  <option value="1">Aktif</option>
                  <option value="0">Nonaktif</option>
                </select>
                <button type="submit" class="btn btn-success btn-sm rounded-pill fw-semibold px-3 shadow-sm">
                  ✔ Simpan
                </button>
              </form>
            </td>

            <td>
              <div class="d-flex justify-content-center flex-wrap gap-2">
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                  ✏️ Edit
                </a>
                @foreach($user->roleUser as $r)
                  <a href="{{ route('roleuser.delete', $r->idrole_user) }}"
                     onclick="return confirm('Yakin ingin hapus role ini?')"
                     class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm fw-semibold">
                     🗑 Hapus
                  </a>
                @endforeach
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection