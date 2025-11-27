@extends('layouts.lte.main')

@section('title', 'Detail Rekam Medis - Pemilik')

@section('page-title', 'Detail Rekam Medis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pemilik.rekammedis.index') }}">Rekam Medis</a></li>
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
                    <div class="text-center mb-3">
                        <i class="fas fa-paw fa-4x text-info"></i>
                    </div>
                    <h4 class="text-center">{{ $rekamMedis->temuDokter->pet->nama ?? '-' }}</h4>
                    <p class="text-muted text-center">
                        {{ $rekamMedis->temuDokter->pet->rasHewan->nama_ras ?? '-' }}
                        ({{ $rekamMedis->temuDokter->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>
                    
                    <hr>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin
                        </div>
                        <div class="col-7">
                            @if($rekamMedis->temuDokter->pet->jenis_kelamin == 'L')
                                <span class="badge badge-info"><i class="fas fa-mars mr-1"></i>Jantan</span>
                            @else
                                <span class="badge badge-pink" style="background-color: #e83e8c; color: white;"><i class="fas fa-venus mr-1"></i>Betina</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Pemeriksaan -->
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-stethoscope mr-2"></i>Info Pemeriksaan
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-calendar mr-1"></i> Tanggal
                        </div>
                        <div class="col-7">
                            {{ $rekamMedis->created_at ? $rekamMedis->created_at->format('d F Y') : '-' }}
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-clock mr-1"></i> Waktu
                        </div>
                        <div class="col-7">
                            {{ $rekamMedis->created_at ? $rekamMedis->created_at->format('H:i') : '-' }} WIB
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-5 text-muted">
                            <i class="fas fa-user-md mr-1"></i> Dokter
                        </div>
                        <div class="col-7">
                            <strong>{{ $rekamMedis->dokter->nama ?? '-' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Rekam Medis -->
        <div class="col-md-8">
            <!-- Keluhan Awal -->
            @if($rekamMedis->temuDokter && $rekamMedis->temuDokter->keluhan)
            <div class="card card-light card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comment-dots mr-2"></i>Keluhan Saat Pendaftaran
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
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-notes-medical mr-2"></i>Hasil Pemeriksaan
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label class="font-weight-bold text-info">
                                <i class="fas fa-comment-medical mr-1"></i> Anamnesa
                            </label>
                            <p class="text-muted mb-1"><small>Keluhan dan riwayat yang disampaikan</small></p>
                            <div class="p-3 bg-light rounded">
                                {{ $rekamMedis->anamnesa ?? '-' }}
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <label class="font-weight-bold text-warning">
                                <i class="fas fa-search mr-1"></i> Temuan Klinis
                            </label>
                            <p class="text-muted mb-1"><small>Hasil pemeriksaan fisik oleh dokter</small></p>
                            <div class="p-3 bg-light rounded">
                                {{ $rekamMedis->temuan_klinis ?? '-' }}
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="font-weight-bold text-success">
                                <i class="fas fa-diagnoses mr-1"></i> Diagnosa
                            </label>
                            <p class="text-muted mb-1"><small>Kesimpulan diagnosa penyakit</small></p>
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
                        <i class="fas fa-syringe mr-2"></i>Tindakan / Terapi yang Dilakukan
                    </h3>
                </div>
                <div class="card-body">
                    @if($rekamMedis->detailRekamMedis && $rekamMedis->detailRekamMedis->count() > 0)
                    <div class="row">
                        @foreach($rekamMedis->detailRekamMedis as $index => $detail)
                        <div class="col-md-6 mb-3">
                            <div class="card card-outline card-success h-100">
                                <div class="card-header py-2">
                                    <h3 class="card-title">
                                        <span class="badge badge-success mr-2">{{ $index + 1 }}</span>
                                        {{ $detail->kodeTindakanTerapi->kode ?? '-' }}
                                    </h3>
                                </div>
                                <div class="card-body py-3">
                                    <h6 class="text-success mb-2">{{ $detail->kodeTindakanTerapi->deskripsi_tindakan_terapi ?? '-' }}</h6>
                                    @if($detail->detail)
                                    <hr class="my-2">
                                    <p class="mb-0 small text-muted">
                                        <strong>Detail:</strong> {{ $detail->detail }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-syringe fa-3x mb-3 d-block"></i>
                        Tidak ada tindakan yang dicatat
                    </div>
                    @endif
                </div>
            </div>

            <div class="mb-4">
                <a href="{{ route('pemilik.rekammedis.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar
                </a>
                <a href="{{ route('pemilik.pet.show', $rekamMedis->temuDokter->pet->idpet ?? 0) }}" class="btn btn-info ml-2">
                    <i class="fas fa-paw mr-1"></i> Lihat Info Hewan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
