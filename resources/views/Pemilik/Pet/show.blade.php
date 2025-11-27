@extends('layouts.lte.main')

@section('title', 'Detail Hewan - Pemilik')

@section('page-title', 'Detail Hewan Peliharaan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pemilik.pet.index') }}">Hewan Peliharaan</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Info Hewan -->
        <div class="col-md-4">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Info Hewan
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-paw fa-5x text-info"></i>
                    </div>
                    <h3 class="text-center mb-1">{{ $pet->nama }}</h3>
                    <p class="text-muted text-center mb-4">
                        {{ $pet->rasHewan->nama_ras ?? '-' }} 
                        ({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>
                    
                    <hr>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-venus-mars mr-2"></i>Jenis Kelamin</span>
                            @if($pet->jenis_kelamin == 'L')
                                <span class="badge badge-info"><i class="fas fa-mars mr-1"></i>Jantan</span>
                            @else
                                <span class="badge badge-pink" style="background-color: #e83e8c; color: white;"><i class="fas fa-venus mr-1"></i>Betina</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-birthday-cake mr-2"></i>Tanggal Lahir</span>
                            <span>{{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d F Y') : '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-palette mr-2"></i>Warna/Tanda</span>
                            <span>{{ $pet->warna_tanda ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-history mr-2"></i>Total Kunjungan</span>
                            <span class="badge badge-primary badge-pill">{{ $riwayatKunjungan->count() }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-2"></i>Statistik
                    </h3>
                </div>
                <div class="card-body">
                    @php
                        $totalKunjungan = $riwayatKunjungan->count();
                        $kunjunganSelesai = $riwayatKunjungan->where('status', 'S')->count();
                        $kunjunganDenganRM = $riwayatKunjungan->whereNotNull('rekamMedis')->count();
                    @endphp
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="text-info mb-0">{{ $totalKunjungan }}</h4>
                            <small class="text-muted">Kunjungan</small>
                        </div>
                        <div class="col-4">
                            <h4 class="text-success mb-0">{{ $kunjunganSelesai }}</h4>
                            <small class="text-muted">Selesai</small>
                        </div>
                        <div class="col-4">
                            <h4 class="text-warning mb-0">{{ $kunjunganDenganRM }}</h4>
                            <small class="text-muted">Rekam Medis</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Kunjungan -->
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-2"></i>Riwayat Kunjungan
                    </h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Tanggal</th>
                                <th style="width: 10%">Antrian</th>
                                <th style="width: 20%">Dokter</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayatKunjungan as $index => $kunjungan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <i class="fas fa-calendar text-muted mr-1"></i>
                                    {{ $kunjungan->waktu_daftar ? \Carbon\Carbon::parse($kunjungan->waktu_daftar)->format('d/m/Y') : '-' }}
                                    <br>
                                    <small class="text-muted">
                                        {{ $kunjungan->waktu_daftar ? \Carbon\Carbon::parse($kunjungan->waktu_daftar)->format('H:i') : '' }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge badge-lg badge-secondary">{{ $kunjungan->no_urut }}</span>
                                </td>
                                <td>
                                    <small>
                                        <i class="fas fa-user-md text-info mr-1"></i>
                                        {{ $kunjungan->roleUser->user->nama ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge {{ $kunjungan->status_badge }}">
                                        {{ $kunjungan->status_label }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('pemilik.jadwal.show', $kunjungan->idreservasi_dokter) }}" 
                                       class="btn btn-info btn-sm" title="Detail Jadwal">
                                        <i class="fas fa-calendar-check"></i>
                                    </a>
                                    @if($kunjungan->rekamMedis)
                                        <a href="{{ route('pemilik.rekammedis.show', $kunjungan->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-warning btn-sm" title="Rekam Medis">
                                            <i class="fas fa-file-medical"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-calendar-times fa-3x mb-3 d-block"></i>
                                    Belum ada riwayat kunjungan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <a href="{{ route('pemilik.pet.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
