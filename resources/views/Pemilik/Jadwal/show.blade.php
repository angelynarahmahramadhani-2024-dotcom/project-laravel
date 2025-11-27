@extends('layouts.lte.main')

@section('title', 'Detail Jadwal - Pemilik')

@section('page-title', 'Detail Jadwal')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pemilik.jadwal.index') }}">Jadwal</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Info Jadwal -->
        <div class="col-md-4">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-check mr-2"></i>Info Jadwal
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <span class="badge badge-lg badge-secondary p-3" style="font-size: 2em;">
                            {{ $jadwal->no_urut }}
                        </span>
                        <p class="text-muted mt-2">Nomor Antrian</p>
                    </div>
                    
                    <hr>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-calendar mr-1"></i> Tanggal
                        </div>
                        <div class="col-7">
                            {{ $jadwal->waktu_daftar ? \Carbon\Carbon::parse($jadwal->waktu_daftar)->format('d F Y') : '-' }}
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-clock mr-1"></i> Waktu
                        </div>
                        <div class="col-7">
                            {{ $jadwal->waktu_daftar ? \Carbon\Carbon::parse($jadwal->waktu_daftar)->format('H:i') : '-' }} WIB
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-info-circle mr-1"></i> Status
                        </div>
                        <div class="col-7">
                            <span class="badge {{ $jadwal->status_badge }}">
                                {{ $jadwal->status_label }}
                            </span>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-user-md mr-1"></i> Dokter
                        </div>
                        <div class="col-7">
                            <strong>{{ $jadwal->roleUser->user->nama ?? '-' }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Hewan -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Info Hewan
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="fas fa-paw fa-4x text-info"></i>
                    </div>
                    <h4 class="text-center">{{ $jadwal->pet->nama ?? '-' }}</h4>
                    <p class="text-muted text-center">
                        {{ $jadwal->pet->rasHewan->nama_ras ?? '-' }}
                        ({{ $jadwal->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>
                    
                    <hr>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Jenis Kelamin</div>
                        <div class="col-7">
                            @if($jadwal->pet->jenis_kelamin == 'L')
                                <span class="badge badge-info"><i class="fas fa-mars mr-1"></i>Jantan</span>
                            @else
                                <span class="badge badge-pink" style="background-color: #e83e8c; color: white;"><i class="fas fa-venus mr-1"></i>Betina</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="{{ route('pemilik.pet.show', $jadwal->pet->idpet) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail Hewan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Kunjungan -->
        <div class="col-md-8">
            <!-- Keluhan -->
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comment-dots mr-2"></i>Keluhan Saat Pendaftaran
                    </h3>
                </div>
                <div class="card-body">
                    <div class="p-3 bg-light rounded">
                        {{ $jadwal->keluhan ?? 'Tidak ada keluhan yang dicatat' }}
                    </div>
                </div>
            </div>

            <!-- Rekam Medis -->
            @if($jadwal->rekamMedis)
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-file-medical mr-2"></i>Rekam Medis
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('pemilik.rekammedis.show', $jadwal->rekamMedis->idrekam_medis) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="font-weight-bold text-info">
                                <i class="fas fa-comment-medical mr-1"></i> Anamnesa
                            </label>
                            <div class="p-3 bg-light rounded">
                                {{ $jadwal->rekamMedis->anamnesa ?? '-' }}
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="font-weight-bold text-warning">
                                <i class="fas fa-search mr-1"></i> Temuan Klinis
                            </label>
                            <div class="p-3 bg-light rounded">
                                {{ $jadwal->rekamMedis->temuan_klinis ?? '-' }}
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="font-weight-bold text-success">
                                <i class="fas fa-diagnoses mr-1"></i> Diagnosa
                            </label>
                            <div class="p-3 bg-light rounded">
                                {{ $jadwal->rekamMedis->diagnosa ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <!-- Tindakan -->
                    @if($jadwal->rekamMedis->detailRekamMedis && $jadwal->rekamMedis->detailRekamMedis->count() > 0)
                    <hr>
                    <h5 class="mb-3"><i class="fas fa-syringe mr-2"></i>Tindakan / Terapi</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Tindakan</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwal->rekamMedis->detailRekamMedis as $index => $detail)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge badge-success">{{ $detail->kodeTindakanTerapi->kode ?? '-' }}</span></td>
                                    <td>{{ $detail->kodeTindakanTerapi->deskripsi_tindakan_terapi ?? '-' }}</td>
                                    <td>{{ $detail->detail ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="card card-secondary card-outline">
                <div class="card-body text-center py-5">
                    <i class="fas fa-file-medical fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Rekam Medis Belum Tersedia</h5>
                    <p class="text-muted">Rekam medis akan tersedia setelah pemeriksaan oleh dokter</p>
                </div>
            </div>
            @endif

            <a href="{{ route('pemilik.jadwal.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
