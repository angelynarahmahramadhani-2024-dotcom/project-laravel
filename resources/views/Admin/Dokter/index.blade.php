@extends('layouts.lte.main')

@section('title', 'Data Dokter')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-md mr-2"></i>Daftar Data Dokter
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah Data Dokter
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

                    @if($usersTanpaDataDokter->count() > 0)
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <strong>Perhatian!</strong> Ada {{ $usersTanpaDataDokter->count() }} user dengan role Dokter yang belum memiliki data lengkap:
                            <ul class="mb-0 mt-2">
                                @foreach($usersTanpaDataDokter as $user)
                                    <li>{{ $user->nama }} ({{ $user->email }})</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('admin.dokter.create') }}" class="btn btn-warning btn-sm mt-2">
                                <i class="fas fa-plus mr-1"></i> Lengkapi Data Sekarang
                            </a>
                        </div>
                    @endif

                    <table id="dokterTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-info text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 20%">Nama</th>
                                <th style="width: 15%">Email</th>
                                <th style="width: 15%">Bidang</th>
                                <th style="width: 12%">No. HP</th>
                                <th style="width: 8%">JK</th>
                                <th style="width: 15%">Alamat</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $dokter)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong><i class="fas fa-user-md text-info mr-1"></i>{{ $dokter->user->nama ?? '-' }}</strong>
                                </td>
                                <td>{{ $dokter->user->email ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-primary">{{ $dokter->bidang_dokter ?? '-' }}</span>
                                </td>
                                <td>{{ $dokter->no_hp ?? '-' }}</td>
                                <td>
                                    @if($dokter->jenis_kelamin == 'L')
                                        <span class="badge badge-info">Laki-laki</span>
                                    @elseif($dokter->jenis_kelamin == 'P')
                                        <span class="badge badge-pink" style="background-color: #e83e8c; color: white;">Perempuan</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $dokter->alamat ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.dokter.edit', $dokter->id_dokter) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.dokter.destroy', $dokter->id_dokter) }}" 
                                          method="POST" style="display: inline-block;"
                                          onsubmit="return confirm('Yakin ingin menghapus data dokter ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
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
        $('#dokterTable').DataTable({
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
