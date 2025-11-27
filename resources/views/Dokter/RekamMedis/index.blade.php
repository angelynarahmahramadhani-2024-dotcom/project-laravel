@extends('layouts.lte.main')

@section('title', 'Rekam Medis - Dokter')

@section('page-title', 'Rekam Medis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Rekam Medis</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-file-medical mr-2"></i>Daftar Rekam Medis
                    </h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <table id="rekamMedisTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 12%">Tanggal</th>
                                <th style="width: 15%">Pasien</th>
                                <th style="width: 15%">Pemilik</th>
                                <th style="width: 25%">Diagnosa</th>
                                <th style="width: 10%">Tindakan</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $rm)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <i class="fas fa-calendar text-muted mr-1"></i>
                                    {{ $rm->created_at ? $rm->created_at->format('d/m/Y') : '-' }}
                                    <br>
                                    <small class="text-muted">{{ $rm->created_at ? $rm->created_at->format('H:i') : '' }}</small>
                                </td>
                                <td>
                                    <strong><i class="fas fa-paw text-info mr-1"></i>{{ $rm->temuDokter->pet->nama ?? '-' }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $rm->temuDokter->pet->rasHewan->nama_ras ?? '-' }}</small>
                                </td>
                                <td>
                                    <i class="fas fa-user text-muted mr-1"></i>
                                    {{ $rm->temuDokter->pet->pemilik->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <small>{{ Str::limit($rm->diagnosa, 50) }}</small>
                                </td>
                                <td>
                                    <span class="badge badge-info">{{ $rm->detailRekamMedis->count() }} tindakan</span>
                                </td>
                                <td>
                                    <a href="{{ route('dokter.rekammedis.show', $rm->idrekam_medis) }}" 
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-file-medical fa-3x mb-3 d-block"></i>
                                    Belum ada rekam medis.
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
        $('#rekamMedisTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [[1, 'desc']],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
            }
        });
    });
</script>
@endpush
