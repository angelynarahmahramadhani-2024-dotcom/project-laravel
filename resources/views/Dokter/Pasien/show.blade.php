@extends('layouts.lte.main')

@section('title', 'Detail Pasien - Dokter')

@section('page-title', 'Detail Pasien')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dokter.pasien.index') }}">Data Pasien</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Info Pet -->
        <div class="col-md-4">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Informasi Pasien
                    </h3>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center mb-3">
                        <i class="fas fa-paw fa-5x text-info"></i>
                    </div>
                    <h3 class="profile-username text-center">{{ $pet->nama }}</h3>
                    <p class="text-muted text-center">
                        {{ $pet->rasHewan->nama_ras ?? '-' }} 
                        ({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b><i class="fas fa-venus-mars mr-2"></i>Jenis Kelamin</b>
                            <span class="float-right">
                                @if($pet->jenis_kelamin == 'L')
                                    <span class="badge badge-info">Jantan</span>
                                @else
                                    <span class="badge badge-pink" style="background-color: #e83e8c; color: white;">Betina</span>
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-birthday-cake mr-2"></i>Umur</b>
                            <span class="float-right">{{ $pet->umur ?? '-' }} tahun</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-weight mr-2"></i>Berat</b>
                            <span class="float-right">{{ $pet->berat ?? '-' }} kg</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Info Pemilik -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user mr-2"></i>Informasi Pemilik
                    </h3>
                </div>
                <div class="card-body">
                    <strong><i class="fas fa-user mr-2"></i>Nama</strong>
                    <p class="text-muted">{{ $pet->pemilik->user->nama ?? '-' }}</p>
                    <hr>
                    <strong><i class="fas fa-envelope mr-2"></i>Email</strong>
                    <p class="text-muted">{{ $pet->pemilik->user->email ?? '-' }}</p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-2"></i>Alamat</strong>
                    <p class="text-muted">{{ $pet->pemilik->alamat ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Riwayat Kunjungan -->
        <div class="col-md-8">
            <div class="card card-success card-outline">
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
                                <th style="width: 20%">Tanggal</th>
                                <th style="width: 25%">Dokter</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 20%">Diagnosa</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayatKunjungan as $index => $kunjungan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <i class="fas fa-calendar text-muted mr-1"></i>
                                    {{ $kunjungan->waktu_daftar ? \Carbon\Carbon::parse($kunjungan->waktu_daftar)->format('d/m/Y H:i') : '-' }}
                                </td>
                                <td>
                                    <i class="fas fa-user-md text-info mr-1"></i>
                                    {{ $kunjungan->roleUser->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge {{ $kunjungan->status_badge }}">
                                        {{ $kunjungan->status_label }}
                                    </span>
                                </td>
                                <td>
                                    <small>{{ Str::limit($kunjungan->rekamMedis->diagnosa ?? '-', 30) }}</small>
                                </td>
                                <td>
                                    @if($kunjungan->rekamMedis)
                                        <a href="{{ route('dokter.rekammedis.show', $kunjungan->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-file-medical"></i>
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada riwayat kunjungan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <a href="{{ route('dokter.pasien.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
