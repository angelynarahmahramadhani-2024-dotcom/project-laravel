@extends('layouts.lte.main')

@section('title', 'Dashboard Dokter')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active"><i class="fas fa-home mr-1"></i> Dashboard</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Welcome Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background: linear-gradient(135deg, #17a2b8 0%, #0c5460 100%);">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="mr-4">
                                <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-stethoscope fa-3x text-white"></i>
                                </div>
                            </div>
                            <div class="text-white">
                                <h3 class="mb-1">Selamat Datang, Dr. {{ $user->nama }}!</h3>
                                <p class="mb-0" style="opacity: 0.9;">{{ now()->translatedFormat('l, d F Y') }}</p>
                                <span class="badge badge-light mt-2"><i class="fas fa-user-md mr-1"></i>Dokter Hewan</span>
                            </div>
                        </div>
                        <div class="d-none d-md-block">
                            <i class="fas fa-heartbeat fa-5x" style="color: rgba(255,255,255,0.2);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Boxes -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                <div class="inner text-white">
                    <h3>{{ $totalPasienHariIni }}</h3>
                    <p>Pasien Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <a href="{{ route('dokter.pasien.index') }}" class="small-box-footer text-white">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
                <div class="inner text-white">
                    <h3>{{ $pasienMenunggu }}</h3>
                    <p>Menunggu Pemeriksaan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                <a href="#antrianTable" class="small-box-footer text-white">
                    Lihat Antrian <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);">
                <div class="inner text-white">
                    <h3>{{ $pasienSelesai }}</h3>
                    <p>Pasien Selesai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <a href="{{ route('dokter.rekammedis.index') }}" class="small-box-footer text-white">
                    Lihat Rekam Medis <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #0c5460 0%, #17a2b8 100%);">
                <div class="inner text-white">
                    <h3>{{ $totalRekamMedis }}</h3>
                    <p>Total Rekam Medis</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <a href="{{ route('dokter.rekammedis.index') }}" class="small-box-footer text-white">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Antrian Hari Ini -->
        <div class="col-lg-8">
            <div class="card card-info card-outline" id="antrianTable">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list-ol mr-2"></i>Antrian Pasien Hari Ini
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 400px;">
                    <table class="table table-hover table-striped">
                        <thead class="sticky-top bg-light">
                            <tr>
                                <th style="width: 60px">No. Urut</th>
                                <th>Nama Pasien</th>
                                <th>Pemilik</th>
                                <th>Status</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($antrianHariIni as $antrian)
                            <tr>
                                <td>
                                    <span class="badge badge-lg badge-info" style="font-size: 1.2em;">
                                        {{ $antrian->no_urut }}
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ $antrian->pet->nama ?? '-' }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ $antrian->pet->rasHewan->nama_ras ?? '-' }} 
                                        ({{ $antrian->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                                    </small>
                                </td>
                                <td>
                                    <i class="fas fa-user text-muted mr-1"></i>
                                    {{ $antrian->pet->pemilik->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge {{ $antrian->status_badge }}">
                                        {{ $antrian->status_label }}
                                    </span>
                                </td>
                                <td>
                                    @if($antrian->rekamMedis)
                                        <a href="{{ route('dokter.detailrekammedis.create', $antrian->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-success btn-sm">
                                            <i class="fas fa-stethoscope"></i> Periksa
                                        </a>
                                        <a href="{{ route('dokter.rekammedis.show', $antrian->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Lihat RM
                                        </a>
                                    @else
                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock"></i> Menunggu RM
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                    Tidak ada antrian hari ini
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Rekam Medis Terbaru -->
        <div class="col-lg-4">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-2"></i>Rekam Medis Terbaru
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($rekamMedisTerbaru as $rm)
                        <li class="list-group-item">
                            <a href="{{ route('dokter.rekammedis.show', $rm->idrekam_medis) }}" class="text-dark">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $rm->temuDokter->pet->nama ?? '-' }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            <i class="fas fa-user mr-1"></i>
                                            {{ $rm->temuDokter->pet->pemilik->user->nama ?? '-' }}
                                        </small>
                                    </div>
                                    <div class="text-right">
                                        <small class="text-muted">
                                            {{ $rm->created_at ? $rm->created_at->diffForHumans() : '-' }}
                                        </small>
                                        <br>
                                        <span class="badge badge-info">
                                            <i class="fas fa-file-medical"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @empty
                        <li class="list-group-item text-center text-muted py-4">
                            <i class="fas fa-file-medical fa-2x mb-2 d-block"></i>
                            Belum ada rekam medis
                        </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('dokter.rekammedis.index') }}" class="btn btn-sm btn-outline-success">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt mr-2"></i>Aksi Cepat
                    </h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('dokter.pasien.index') }}" class="btn btn-block btn-outline-info mb-2">
                        <i class="fas fa-paw mr-2"></i>Lihat Data Pasien
                    </a>
                    <a href="{{ route('dokter.rekammedis.index') }}" class="btn btn-block btn-outline-success mb-2">
                        <i class="fas fa-file-medical mr-2"></i>Rekam Medis
                    </a>
                    <a href="{{ route('dokter.profil.index') }}" class="btn btn-block btn-outline-secondary">
                        <i class="fas fa-user mr-2"></i>Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
