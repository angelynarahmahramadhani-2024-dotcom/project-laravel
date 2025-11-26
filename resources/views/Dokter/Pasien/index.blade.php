@extends('layouts.lte.main')

@section('title', 'Data Pasien - Dokter')

@section('page-title', 'Data Pasien')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Data Pasien</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Daftar Pasien yang Pernah Ditangani
                    </h3>
                </div>
                <div class="card-body">
                    <table id="pasienTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-info text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Nama Pasien</th>
                                <th style="width: 15%">Jenis / Ras</th>
                                <th style="width: 10%">Jenis Kelamin</th>
                                <th style="width: 20%">Pemilik</th>
                                <th style="width: 15%">Kontak</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $pet)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong><i class="fas fa-paw text-info mr-1"></i>{{ $pet->nama_pet }}</strong>
                                </td>
                                <td>
                                    <span class="badge badge-primary">{{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</span>
                                    <br>
                                    <small class="text-muted">{{ $pet->rasHewan->nama_ras ?? '-' }}</small>
                                </td>
                                <td>
                                    @if($pet->jenis_kelamin == 'L')
                                        <span class="badge badge-info"><i class="fas fa-mars mr-1"></i>Jantan</span>
                                    @else
                                        <span class="badge badge-pink" style="background-color: #e83e8c; color: white;"><i class="fas fa-venus mr-1"></i>Betina</span>
                                    @endif
                                </td>
                                <td>
                                    <i class="fas fa-user text-muted mr-1"></i>
                                    {{ $pet->pemilik->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <small>
                                        <i class="fas fa-envelope text-muted mr-1"></i>{{ $pet->pemilik->user->email ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <a href="{{ route('dokter.pasien.show', $pet->idpet) }}" class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                    Belum ada data pasien yang pernah ditangani.
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
        $('#pasienTable').DataTable({
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
