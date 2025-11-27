@extends('layouts.lte.main')

@section('title', 'Detail Rekam Medis - Perawat')

@section('page-title', 'Detail Rekam Medis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('perawat.rekammedis.index') }}">Rekam Medis</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fas fa-info-circle mr-2"></i>{{ session('info') }}
        </div>
    @endif

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
                    <div class="text-center mb-3">
                        <i class="fas fa-paw fa-4x text-success"></i>
                    </div>
                    <h4 class="text-center">{{ $rekamMedis->temuDokter->pet->nama ?? '-' }}</h4>
                    <p class="text-muted text-center">
                        {{ $rekamMedis->temuDokter->pet->rasHewan->nama_ras ?? '-' }}
                        ({{ $rekamMedis->temuDokter->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>
                    <hr>
                    <p><strong><i class="fas fa-user mr-2"></i>Pemilik:</strong></p>
                    <p>{{ $rekamMedis->temuDokter->pet->pemilik->user->nama ?? '-' }}</p>
                    <p><strong><i class="fas fa-calendar mr-2"></i>Tanggal Periksa:</strong></p>
                    <p>{{ $rekamMedis->created_at ? $rekamMedis->created_at->format('d F Y, H:i') : '-' }}</p>
                    <p><strong><i class="fas fa-user-md mr-2"></i>Dokter Pemeriksa:</strong></p>
                    <p>{{ $rekamMedis->dokter->nama ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Detail Rekam Medis -->
        <div class="col-md-8">
            <!-- Keluhan Awal -->
            @if($rekamMedis->temuDokter && $rekamMedis->temuDokter->keluhan)
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comment-dots mr-2"></i>Keluhan Awal (Saat Pendaftaran)
                    </h3>
                </div>
                <div class="card-body">
                    <div class="p-3 bg-light rounded">
                        {{ $rekamMedis->temuDokter->keluhan }}
                    </div>
                </div>
            </div>
            @endif

            <!-- Hasil Pemeriksaan -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-notes-medical mr-2"></i>Hasil Pemeriksaan
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('perawat.rekammedis.edit', $rekamMedis->idrekam_medis) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit mr-1"></i> Edit
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
                                {{ $rekamMedis->anamnesa ?? '-' }}
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="font-weight-bold text-warning">
                                <i class="fas fa-search mr-1"></i> Temuan Klinis
                            </label>
                            <div class="p-3 bg-light rounded">
                                {{ $rekamMedis->temuan_klinis ?? '-' }}
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="font-weight-bold text-success">
                                <i class="fas fa-diagnoses mr-1"></i> Diagnosa
                            </label>
                            <div class="p-3 bg-light rounded">
                                {{ $rekamMedis->diagnosa ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Tindakan -->
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-syringe mr-2"></i>Detail Tindakan / Terapi
                    </h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 20%">Kode</th>
                                <th style="width: 35%">Nama Tindakan</th>
                                <th style="width: 40%">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rekamMedis->detailRekamMedis as $index => $detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <span class="badge badge-success">{{ $detail->kodeTindakanTerapi->kode ?? '-' }}</span>
                                </td>
                                <td>
                                    {{ $detail->kodeTindakanTerapi->deskripsi_tindakan_terapi ?? '-' }}
                                </td>
                                <td>{{ $detail->detail ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fas fa-syringe fa-2x mb-2 d-block"></i>
                                    Belum ada tindakan yang dicatat.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <a href="{{ route('perawat.rekammedis.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
