@extends('layouts.lte.main')

@section('title', 'Buat Rekam Medis - Perawat')

@section('page-title', 'Buat Rekam Medis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('perawat.rekammedis.index') }}">Rekam Medis</a></li>
    <li class="breadcrumb-item active">Buat Baru</li>
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
                    <h4 class="text-center">{{ $temuDokter->pet->nama ?? '-' }}</h4>
                    <p class="text-muted text-center">
                        {{ $temuDokter->pet->rasHewan->nama_ras ?? '-' }}
                        ({{ $temuDokter->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>
                    <hr>
                    <p><strong><i class="fas fa-user mr-2"></i>Pemilik:</strong></p>
                    <p>{{ $temuDokter->pet->pemilik->user->nama ?? '-' }}</p>
                    <p><strong><i class="fas fa-calendar mr-2"></i>Tanggal Kunjungan:</strong></p>
                    <p>{{ $temuDokter->waktu_daftar ? \Carbon\Carbon::parse($temuDokter->waktu_daftar)->format('d F Y, H:i') : '-' }}</p>
                    <p><strong><i class="fas fa-list-ol mr-2"></i>No. Antrian:</strong></p>
                    <p><span class="badge badge-lg badge-success" style="font-size: 1.2em;">{{ $temuDokter->no_urut }}</span></p>
                    
                    @if($temuDokter->keluhan)
                    <hr>
                    <p><strong><i class="fas fa-comment-dots mr-2"></i>Keluhan Awal:</strong></p>
                    <div class="p-2 bg-light rounded">
                        <small>{{ $temuDokter->keluhan }}</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Form Rekam Medis -->
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-notes-medical mr-2"></i>Form Rekam Medis
                    </h3>
                </div>
                <form action="{{ route('perawat.rekammedis.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idreservasi_dokter" value="{{ $temuDokter->idreservasi_dokter }}">
                    
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
                                      placeholder="Keluhan dan riwayat penyakit dari pemilik..."
                                      required>{{ old('anamnesa') }}</textarea>
                            @error('anamnesa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Catatan keluhan dan riwayat penyakit yang disampaikan pemilik.</small>
                        </div>

                        <div class="form-group">
                            <label for="temuan_klinis">
                                <i class="fas fa-search mr-1 text-warning"></i>Temuan Klinis <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('temuan_klinis') is-invalid @enderror" 
                                      id="temuan_klinis" 
                                      name="temuan_klinis" 
                                      rows="4" 
                                      placeholder="Hasil pemeriksaan fisik..."
                                      required>{{ old('temuan_klinis') }}</textarea>
                            @error('temuan_klinis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Hasil observasi dan pemeriksaan fisik pada pasien.</small>
                        </div>

                        <div class="form-group">
                            <label for="diagnosa">
                                <i class="fas fa-diagnoses mr-1 text-success"></i>Diagnosa <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('diagnosa') is-invalid @enderror" 
                                      id="diagnosa" 
                                      name="diagnosa" 
                                      rows="4" 
                                      placeholder="Diagnosa penyakit..."
                                      required>{{ old('diagnosa') }}</textarea>
                            @error('diagnosa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Kesimpulan diagnosa berdasarkan anamnesa dan temuan klinis.</small>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save mr-1"></i> Simpan Rekam Medis
                        </button>
                        <a href="{{ route('perawat.dashboard') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times mr-1"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
