@extends('layouts.lte.main')

@section('title', 'Antrian Hari Ini - Perawat')

@section('page-title', 'Antrian Hari Ini')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Antrian Hari Ini</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Info Boxes -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalAntrian }}</h3>
                    <p>Total Antrian</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $menunggu }}</h3>
                    <p>Menunggu</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $proses }}</h3>
                    <p>Dalam Proses</p>
                </div>
                <div class="icon">
                    <i class="fas fa-spinner"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $selesai }}</h3>
                    <p>Selesai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Antrian -->
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list-ol mr-2"></i>Daftar Antrian - {{ now()->translatedFormat('l, d F Y') }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('perawat.antrian.history') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-history mr-1"></i> Riwayat Reservasi
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

                    <table id="antrianTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white">
                            <tr>
                                <th style="width: 8%">No. Urut</th>
                                <th style="width: 12%">Waktu</th>
                                <th style="width: 18%">Pasien</th>
                                <th style="width: 15%">Pemilik</th>
                                <th style="width: 12%">Dokter</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%">Rekam Medis</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($antrianHariIni as $antrian)
                            <tr>
                                <td class="text-center">
                                    <span class="badge badge-lg badge-success" style="font-size: 1.3em; padding: 10px 15px;">
                                        {{ $antrian->no_urut }}
                                    </span>
                                </td>
                                <td>
                                    <i class="fas fa-clock text-muted mr-1"></i>
                                    {{ \Carbon\Carbon::parse($antrian->waktu_daftar)->format('H:i') }}
                                    <br>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($antrian->waktu_daftar)->format('d/m/Y') }}
                                    </small>
                                </td>
                                <td>
                                    <strong><i class="fas fa-paw text-success mr-1"></i>{{ $antrian->pet->nama ?? '-' }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ $antrian->pet->rasHewan->nama_ras ?? '-' }} 
                                        ({{ $antrian->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                                    </small>
                                </td>
                                <td>
                                    <i class="fas fa-user text-muted mr-1"></i>
                                    {{ $antrian->pet->pemilik->user->nama ?? '-' }}
                                    <br>
                                    <small class="text-muted">
                                        <i class="fab fa-whatsapp text-success mr-1"></i>
                                        {{ $antrian->pet->pemilik->no_wa ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <i class="fas fa-user-md text-info mr-1"></i>
                                    {{ $antrian->roleUser->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge {{ $antrian->status_badge }} badge-lg">
                                        {{ $antrian->status_label }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($antrian->rekamMedis)
                                        <span class="badge badge-success">
                                            <i class="fas fa-check mr-1"></i>Ada
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            <i class="fas fa-minus mr-1"></i>Belum
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($antrian->rekamMedis)
                                        <a href="{{ route('perawat.rekammedis.show', $antrian->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-info btn-sm" title="Lihat Rekam Medis">
                                            <i class="fas fa-eye"></i> Lihat RM
                                        </a>
                                        <a href="{{ route('perawat.rekammedis.edit', $antrian->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-warning btn-sm" title="Edit Rekam Medis">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('perawat.rekammedis.create', $antrian->idreservasi_dokter) }}" 
                                           class="btn btn-success btn-sm" title="Buat Rekam Medis">
                                            <i class="fas fa-plus mr-1"></i> Buat RM
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                    Belum ada antrian hari ini.
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
        $('#antrianTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [[0, 'asc']],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
            }
        });
    });
</script>
@endpush
