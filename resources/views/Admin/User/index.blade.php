@extends('layouts.lte.main')

@section('title', 'User - Admin')

@section('page-title', 'User')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">User</li>
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
                        <i class="fas fa-users mr-2"></i>Daftar User
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <table id="userTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 8%">ID</th>
                                <th style="width: 20%">Nama</th>
                                <th style="width: 25%">Email</th>
                                <th style="width: 22%">Role</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="badge badge-info">{{ $item->iduser }}</span></td>
                                <td>
                                    <i class="fas fa-user text-primary mr-1"></i>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    <i class="fas fa-envelope text-muted mr-1"></i>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    @forelse($item->roleUser as $r)
                                        @if($r->role)
                                            <span class="badge 
                                                @if(strtolower($r->role->nama_role) == 'administrator') badge-admin
                                                @elseif(strtolower($r->role->nama_role) == 'dokter') badge-dokter
                                                @elseif(strtolower($r->role->nama_role) == 'perawat') badge-perawat
                                                @elseif(strtolower($r->role->nama_role) == 'resepsionis') badge-resepsionis
                                                @elseif(strtolower($r->role->nama_role) == 'pemilik') badge-pemilik
                                                @else badge-secondary
                                                @endif mr-1">
                                                {{ $r->role->nama_role }}
                                            </span>
                                        @endif
                                    @empty
                                        <span class="text-muted"><i class="fas fa-minus-circle mr-1"></i>Belum ada role</span>
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $item->iduser) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.user.delete', $item->iduser) }}" 
                                       onclick="return confirm('Yakin mau hapus user ini?')" 
                                       class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
        $('#userTable').DataTable({
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
