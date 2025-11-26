@extends('layouts.lte.main')

@section('title', 'Manajemen Role User - Admin')

@section('page-title', 'Manajemen Role User')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Role User</li>
@endsection

@push('styles')
<style>
    .badge-admin { background-color: #dc3545; color: white; }
    .badge-dokter { background-color: #007bff; color: white; }
    .badge-perawat { background-color: #28a745; color: white; }
    .badge-resepsionis { background-color: #ffc107; color: black; }
    .badge-pemilik { background-color: #17a2b8; color: white; }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users-cog mr-2"></i>Manajemen Role User RSHP
                    </h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <table id="roleUserTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 8%">ID User</th>
                                <th style="width: 15%">Nama</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 32%">Role & Tambah Role</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="badge badge-info">{{ $user->iduser }}</span></td>
                                <td>
                                    <i class="fas fa-user text-primary mr-1"></i>
                                    {{ $user->nama }}
                                </td>
                                <td>
                                    <i class="fas fa-envelope text-muted mr-1"></i>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <!-- Daftar Role Aktif -->
                                    <div class="mb-2">
                                        @forelse($user->roleUser as $r)
                                            @if($r->role)
                                                <span class="badge 
                                                    @if(strtolower($r->role->nama_role) == 'administrator') badge-admin
                                                    @elseif(strtolower($r->role->nama_role) == 'dokter') badge-dokter
                                                    @elseif(strtolower($r->role->nama_role) == 'perawat') badge-perawat
                                                    @elseif(strtolower($r->role->nama_role) == 'resepsionis') badge-resepsionis
                                                    @elseif(strtolower($r->role->nama_role) == 'pemilik') badge-pemilik
                                                    @else badge-secondary
                                                    @endif mr-1 mb-1">
                                                    <i class="fas fa-user-tag mr-1"></i>{{ $r->role->nama_role }}
                                                </span>
                                            @else
                                                <span class="text-muted">(Role tidak ditemukan)</span>
                                            @endif
                                        @empty
                                            <span class="text-muted"><i class="fas fa-exclamation-circle mr-1"></i>Belum punya role</span>
                                        @endforelse
                                    </div>

                                    <!-- Form Tambah Role -->
                                    <form action="{{ route('admin.roleuser.store') }}" method="POST" class="form-inline">
                                        @csrf
                                        <input type="hidden" name="iduser" value="{{ $user->iduser }}">
                                        <select name="idrole" class="form-control form-control-sm mr-1" style="width:100px;" required>
                                            <option value="">Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                                            @endforeach
                                        </select>
                                        <select name="status" class="form-control form-control-sm mr-1" style="width:80px;">
                                            <option value="1">Aktif</option>
                                            <option value="0">Nonaktif</option>
                                        </select>
                                        <button type="submit" class="btn btn-success btn-sm" title="Tambah Role">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <div class="btn-group-vertical btn-group-sm">
                                        @foreach($user->roleUser as $r)
                                            <a href="{{ route('admin.roleuser.delete', $r->idrole_user) }}"
                                               onclick="return confirm('Yakin ingin hapus role {{ $r->role->nama_role ?? '' }} dari user ini?')"
                                               class="btn btn-danger btn-sm mb-1" title="Hapus Role {{ $r->role->nama_role ?? '' }}">
                                                <i class="fas fa-trash mr-1"></i> {{ $r->role->nama_role ?? 'Role' }}
                                            </a>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada data user.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#roleUserTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
            }
        });
    });
</script>
@endpush