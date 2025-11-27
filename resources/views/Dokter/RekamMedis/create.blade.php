@extends('layouts.lte.main')

@section('title', 'Buat Rekam Medis - Dokter')

@section('page-title', 'Buat Rekam Medis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dokter.rekammedis.index') }}">Rekam Medis</a></li>
    <li class="breadcrumb-item active">Buat Baru</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Info Pasien -->
        <div class="col-md-4">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Informasi Pasien
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="fas fa-paw fa-4x text-info"></i>
                    </div>
                    <h4 class="text-center">{{ $temuDokter->pet->nama ?? '-' }}</h4>
                    <p class="text-muted text-center">
                        {{ $temuDokter->pet->rasHewan->nama_ras ?? '-' }}
                        ({{ $temuDokter->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                    </p>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-venus-mars mr-2"></i>Jenis Kelamin</span>
                            <span>{{ $temuDokter->pet->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-user mr-2"></i>Pemilik</span>
                            <span>{{ $temuDokter->pet->pemilik->user->nama ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-ticket-alt mr-2"></i>No. Antrian</span>
                            <span class="badge badge-info">{{ $temuDokter->no_urut }}</span>
                        </li>
                    </ul>
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
                <form action="{{ route('dokter.rekammedis.store') }}" method="POST">
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
                                      placeholder="Keluhan / riwayat yang disampaikan pemilik..."
                                      required>{{ old('anamnesa') }}</textarea>
                            @error('anamnesa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Catatan keluhan atau riwayat penyakit dari pemilik hewan</small>
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
                            <small class="text-muted">Hasil pemeriksaan fisik yang ditemukan</small>
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
                            <small class="text-muted">Kesimpulan diagnosa berdasarkan anamnesa dan temuan klinis</small>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fas fa-save mr-1"></i> Simpan Rekam Medis
                        </button>
                    </div>
                </form>
            </div>

            <!-- Info -->
            <div class="callout callout-info">
                <h5><i class="fas fa-info-circle mr-2"></i>Informasi</h5>
                <p class="mb-0">
                    Setelah menyimpan rekam medis, Anda akan diarahkan ke halaman detail untuk menambahkan <strong>tindakan/terapi</strong>.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
