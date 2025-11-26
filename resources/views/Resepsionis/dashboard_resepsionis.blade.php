@extends('layouts.lte.main')

@section('title', 'Dashboard Resepsionis')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active"><i class="fas fa-home mr-1"></i> Dashboard</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="text-white mb-1">Selamat Datang, {{ Auth::user()->nama ?? 'Resepsionis' }}! 👋</h2>
                            <p class="text-white mb-0">Panel Resepsionis - Rumah Sakit Hewan</p>
                        </div>
                        <div>
                            <i class="fas fa-concierge-bell fa-4x text-white-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Boxes -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPemilik }}</h3>
                    <p>Total Pemilik</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('resepsionis.pemilik.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalPet }}</h3>
                    <p>Total Pet</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paw"></i>
                </div>
                <a href="{{ route('resepsionis.pet.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $antrianHariIni }}</h3>
                    <p>Antrian Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <a href="{{ route('resepsionis.temudokter.antrian') }}" class="small-box-footer">
                    Lihat Antrian <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $antrianMenunggu }}</h3>
                    <p>Menunggu Dipanggil</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <a href="{{ route('resepsionis.temudokter.antrian') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Antrian Hari Ini -->
        <div class="col-md-8">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-clipboard-list mr-2"></i>Antrian Hari Ini
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('resepsionis.temudokter.create') }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-plus mr-1"></i> Daftar Baru
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 400px;">
                    <table class="table table-hover table-striped table-head-fixed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pet</th>
                                <th>Pemilik</th>
                                <th>Dokter</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($antrian as $item)
                                <tr>
                                    <td>
                                        <span class="badge badge-lg badge-warning">{{ $item->no_urut }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $item->pet->nama ?? '-' }}</strong>
                                        <br><small class="text-muted">{{ $item->pet->jenisHewan->nama_jenis_hewan ?? '-' }}</small>
                                    </td>
                                    <td>{{ $item->pet->pemilik->user->nama ?? '-' }}</td>
                                    <td>{{ $item->roleUser->user->nama ?? '-' }}</td>
                                    <td>
                                        <span class="badge {{ $item->status_badge }}">{{ $item->status_label }}</span>
                                    </td>
                                    <td>
                                        @if($item->status == 'W')
                                            <a href="{{ route('resepsionis.temudokter.updateStatus', [$item->idreservasi_dokter, 'P']) }}" 
                                               class="btn btn-info btn-xs" title="Proses">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        @endif
                                        @if($item->status == 'P')
                                            <a href="{{ route('resepsionis.temudokter.updateStatus', [$item->idreservasi_dokter, 'S']) }}" 
                                               class="btn btn-success btn-xs" title="Selesai">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                        Belum ada antrian hari ini
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt mr-2"></i>Aksi Cepat
                    </h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('resepsionis.temudokter.create') }}" class="btn btn-warning btn-block mb-3">
                        <i class="fas fa-calendar-plus mr-2"></i> Daftar Kunjungan Baru
                    </a>
                    <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-info btn-block mb-3">
                        <i class="fas fa-user-plus mr-2"></i> Tambah Pemilik Baru
                    </a>
                    <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-success btn-block mb-3">
                        <i class="fas fa-paw mr-2"></i> Tambah Pet Baru
                    </a>
                    <a href="{{ route('resepsionis.temudokter.antrian') }}" class="btn btn-secondary btn-block">
                        <i class="fas fa-list-ol mr-2"></i> Lihat Semua Antrian
                    </a>
                </div>
            </div>

            <!-- Pendaftaran Terbaru -->
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-2"></i>Pendaftaran Terbaru
                    </h3>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($pendaftaranTerbaru as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->pet->nama ?? '-' }}</strong>
                                    <br><small class="text-muted">{{ $item->waktu_daftar }}</small>
                                </div>
                                <span class="badge {{ $item->status_badge }}">{{ $item->status_label }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">
                                Belum ada data
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
