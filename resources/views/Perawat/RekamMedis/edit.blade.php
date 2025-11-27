@extends('layouts.lte.main')

@section('title', 'Edit Rekam Medis - Perawat')

@section('page-title', 'Edit Rekam Medis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('perawat.rekammedis.index') }}">Rekam Medis</a></li>
    <li class="breadcrumb-item active">Edit</li>
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
        </div>

        <!-- Form Edit Rekam Medis -->
        <div class="col-md-8">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>Edit Rekam Medis
                    </h3>
                </div>
                <form action="{{ route('perawat.rekammedis.update', $rekamMedis->idrekam_medis) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="anamnesa">
                                <i class="fas fa-comment-medical mr-1 text-info"></i>Anamnesa <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('anamnesa') is-invalid @enderror" 
                                      id="anamnesa" 
                                      name="anamnesa" 
                                      rows="4" 
                                      required>{{ old('anamnesa', $rekamMedis->anamnesa) }}</textarea>
                            @error('anamnesa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="temuan_klinis">
                                <i class="fas fa-search mr-1 text-warning"></i>Temuan Klinis <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('temuan_klinis') is-invalid @enderror" 
                                      id="temuan_klinis" 
                                      name="temuan_klinis" 
                                      rows="4" 
                                      required>{{ old('temuan_klinis', $rekamMedis->temuan_klinis) }}</textarea>
                            @error('temuan_klinis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="diagnosa">
                                <i class="fas fa-diagnoses mr-1 text-success"></i>Diagnosa <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('diagnosa') is-invalid @enderror" 
                                      id="diagnosa" 
                                      name="diagnosa" 
                                      rows="4" 
                                      required>{{ old('diagnosa', $rekamMedis->diagnosa) }}</textarea>
                            @error('diagnosa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save mr-1"></i> Update Rekam Medis
                        </button>
                        <a href="{{ route('perawat.rekammedis.show', $rekamMedis->idrekam_medis) }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times mr-1"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
