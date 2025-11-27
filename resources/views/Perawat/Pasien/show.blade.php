@extends('layouts.lte.main')

@section('title', 'Detail Pasien - Perawat')

@section('page-title', 'Detail Pasien')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('perawat.pasien.index') }}">Data Pasien</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Info Pasien -->
        <div class="col-md-4">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Informasi Pasien
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-paw fa-5x text-success"></i>
                    </div>
                    <h3 class="text-center mb-1">{{ $pet->nama }}</h3>
                    <p class="text-muted text-center mb-4">
                        {{ $pet->rasHewan->nama_ras ?? '-' }} 
                        ({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>
                    
                    <hr>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin
                        </div>
                        <div class="col-7">
                            @if($pet->jenis_kelamin == 'L')
                                <span class="badge badge-info"><i class="fas fa-mars mr-1"></i>Jantan</span>
                            @else
                                <span class="badge badge-pink" style="background-color: #e83e8c; color: white;"><i class="fas fa-venus mr-1"></i>Betina</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-birthday-cake mr-1"></i> Tanggal Lahir
                        </div>
                        <div class="col-7">
                            {{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d F Y') : '-' }}
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-palette mr-1"></i> Warna/Tanda
                        </div>
                        <div class="col-7">
                            {{ $pet->warna_tanda ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Pemilik -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user mr-2"></i>Informasi Pemilik
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-4 text-muted">
                            <i class="fas fa-user mr-1"></i> Nama
                        </div>
                        <div class="col-8">
                            <strong>{{ $pet->pemilik->user->nama ?? '-' }}</strong>
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-4 text-muted">
                            <i class="fas fa-envelope mr-1"></i> Email
                        </div>
                        <div class="col-8">
                            {{ $pet->pemilik->user->email ?? '-' }}
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-4 text-muted">
                            <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                        </div>
                        <div class="col-8">
                            @if($pet->pemilik->no_wa)
                                <a href="https://wa.me/{{ $pet->pemilik->no_wa }}" target="_blank" class="text-success">
                                    {{ $pet->pemilik->no_wa }}
                                </a>
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4 text-muted">
                            <i class="fas fa-map-marker-alt mr-1"></i> Alamat
                        </div>
                        <div class="col-8">
                            {{ $pet->pemilik->alamat ?? '-' }}
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Tanggal</th>
                                <th style="width: 15%">No. Antrian</th>
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
                                    <span class="badge badge-lg badge-info" style="font-size: 1.2em;">{{ $kunjungan->no_urut }}</span>
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
                                    @if($kunjungan->rekamMedis)
                                        <a href="{{ route('perawat.rekammedis.show', $kunjungan->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-info btn-sm" title="Lihat Rekam Medis">
                                            <i class="fas fa-file-medical"></i> RM
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            <i class="fas fa-minus-circle"></i> Belum ada RM
                                        </span>
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

            <a href="{{ route('perawat.pasien.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
