@extends('layouts.lte.main')

@section('title', 'Dashboard Perawat')

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
                                    <i class="fas fa-user-nurse fa-3x text-white"></i>
                                </div>
                            </div>
                            <div class="text-white">
                                <h3 class="mb-1">Selamat Datang, {{ $user->nama }}!</h3>
                                <p class="mb-0" style="opacity: 0.9;">{{ now()->translatedFormat('l, d F Y') }}</p>
                                <span class="badge badge-light mt-2"><i class="fas fa-user-nurse mr-1"></i>Perawat</span>
                            </div>
                        </div>
                        <div class="d-none d-md-block">
                            <i class="fas fa-hand-holding-medical fa-5x" style="color: rgba(255,255,255,0.2);"></i>
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
                <a href="{{ route('perawat.pasien.index') }}" class="small-box-footer text-white">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
                <div class="inner text-white">
                    <h3>{{ $pasienMenunggu }}</h3>
                    <p>Menunggu</p>
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
            <div class="small-box" style="background: linear-gradient(135deg, #0c5460 0%, #17a2b8 100%);">
                <div class="inner text-white">
                    <h3>{{ $pasienDalamProses }}</h3>
                    <p>Dalam Proses</p>
                </div>
                <div class="icon">
                    <i class="fas fa-spinner"></i>
                </div>
                <a href="{{ route('perawat.rekammedis.index') }}" class="small-box-footer text-white">
                    Lihat Rekam Medis <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);">
                <div class="inner text-white">
                    <h3>{{ $pasienSelesai }}</h3>
                    <p>Selesai Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <a href="{{ route('perawat.rekammedis.index') }}" class="small-box-footer text-white">
                    Lihat Rekam Medis <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Statistik Row -->
    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-paw"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Pasien Terdaftar</span>
                    <span class="info-box-number">{{ $totalPet }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        Semua pasien di klinik
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-file-medical"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Rekam Medis</span>
                    <span class="info-box-number">{{ $totalRekamMedis }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        Semua rekam medis
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Antrian Hari Ini -->
        <div class="col-lg-8">
            <div class="card card-success card-outline" id="antrianTable">
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
                                <th>Dokter</th>
                                <th>Status</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($antrianHariIni as $antrian)
                            <tr>
                                <td>
                                    <span class="badge badge-lg badge-success" style="font-size: 1.2em;">
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
                                    <small>
                                        <i class="fas fa-user-md text-info mr-1"></i>
                                        {{ $antrian->roleUser->user->nama ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge {{ $antrian->status_badge }}">
                                        {{ $antrian->status_label }}
                                    </span>
                                </td>
                                <td>
                                    @if($antrian->rekamMedis)
                                        <a href="{{ route('perawat.rekammedis.show', $antrian->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-info btn-sm" title="Lihat Rekam Medis">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('perawat.rekammedis.create', $antrian->idreservasi_dokter) }}" 
                                           class="btn btn-success btn-sm" title="Buat Rekam Medis">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
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
            <div class="card card-info card-outline">
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
                            <a href="{{ route('perawat.rekammedis.show', $rm->idrekam_medis) }}" class="text-dark">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong><i class="fas fa-paw text-success mr-1"></i>{{ $rm->temuDokter->pet->nama ?? '-' }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            <i class="fas fa-user mr-1"></i>{{ $rm->temuDokter->pet->pemilik->user->nama ?? '-' }}
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar mr-1"></i>{{ $rm->created_at ? $rm->created_at->format('d/m/Y H:i') : '-' }}
                                        </small>
                                    </div>
                                    <div>
                                        <i class="fas fa-chevron-right text-muted"></i>
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
                    <a href="{{ route('perawat.rekammedis.index') }}" class="text-success">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-link mr-2"></i>Akses Cepat
                    </h3>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('perawat.pasien.index') }}" class="text-success d-flex align-items-center">
                                <i class="fas fa-paw mr-3"></i>
                                <span>Data Pasien</span>
                                <i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('perawat.rekammedis.index') }}" class="text-success d-flex align-items-center">
                                <i class="fas fa-file-medical mr-3"></i>
                                <span>Rekam Medis</span>
                                <i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('perawat.profil.index') }}" class="text-success d-flex align-items-center">
                                <i class="fas fa-user mr-3"></i>
                                <span>Profil Saya</span>
                                <i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
