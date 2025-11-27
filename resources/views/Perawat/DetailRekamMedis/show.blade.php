@extends('layouts.lte.main')

@section('title', 'Detail Rekam Medis - Perawat')

@section('page-title', 'Detail Rekam Medis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('perawat.rekammedis.index') }}">Rekam Medis</a></li>
    <li class="breadcrumb-item active">Detail Tindakan</li>
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

            <!-- Hasil Pemeriksaan -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-notes-medical mr-2"></i>Ringkasan Pemeriksaan
                    </h3>
                </div>
                <div class="card-body">
                    <p><strong class="text-info"><i class="fas fa-comment-medical mr-1"></i> Anamnesa:</strong></p>
                    <p class="small">{{ Str::limit($rekamMedis->anamnesa, 100) }}</p>
                    
                    <p><strong class="text-warning"><i class="fas fa-search mr-1"></i> Temuan Klinis:</strong></p>
                    <p class="small">{{ Str::limit($rekamMedis->temuan_klinis, 100) }}</p>
                    
                    <p><strong class="text-success"><i class="fas fa-diagnoses mr-1"></i> Diagnosa:</strong></p>
                    <p class="small">{{ Str::limit($rekamMedis->diagnosa, 100) }}</p>
                    
                    <a href="{{ route('perawat.rekammedis.show', $rekamMedis->idrekam_medis) }}" class="btn btn-info btn-sm btn-block">
                        <i class="fas fa-eye mr-1"></i> Lihat Detail Lengkap
                    </a>
                </div>
            </div>
        </div>

        <!-- Detail Tindakan -->
        <div class="col-md-8">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-syringe mr-2"></i>Daftar Tindakan / Terapi
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($rekamMedis->detailRekamMedis as $index => $detail)
                        <div class="col-md-6 mb-3">
                            <div class="card card-outline card-success h-100">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <span class="badge badge-success mr-2">{{ $index + 1 }}</span>
                                        {{ $detail->kodeTindakanTerapi->kode ?? '-' }}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-success">{{ $detail->kodeTindakanTerapi->deskripsi_tindakan_terapi ?? '-' }}</h5>
                                    <hr>
                                    <p class="mb-0"><strong>Detail:</strong></p>
                                    <p class="text-muted">{{ $detail->detail ?? 'Tidak ada detail tambahan' }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="text-center text-muted py-5">
                                <i class="fas fa-syringe fa-4x mb-3 d-block"></i>
                                <h5>Belum ada tindakan yang dicatat</h5>
                                <p>Tindakan akan ditambahkan oleh dokter pemeriksa</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <a href="{{ route('perawat.rekammedis.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection
