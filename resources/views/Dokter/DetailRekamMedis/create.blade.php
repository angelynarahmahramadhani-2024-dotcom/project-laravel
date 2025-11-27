@extends('layouts.lte.main')

@section('title', 'Tambah Tindakan - Dokter')

@section('page-title', 'Tambah Tindakan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dokter.rekammedis.index') }}">Rekam Medis</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dokter.rekammedis.show', $rekamMedis->idrekam_medis) }}">Detail</a></li>
    <li class="breadcrumb-item active">Tambah Tindakan</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus-circle mr-2"></i>Form Tambah Tindakan / Terapi
                    </h3>
                </div>
                <form action="{{ route('dokter.detailrekammedis.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idrekam_medis" value="{{ $rekamMedis->idrekam_medis }}">
                    
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

                        <div class="alert alert-info">
                            <i class="fas fa-paw mr-2"></i>
                            <strong>Pasien:</strong> {{ $rekamMedis->temuDokter->pet->nama ?? '-' }}
                        </div>

                        <div class="form-group">
                            <label for="idkode_tindakan_terapi">
                                <i class="fas fa-syringe mr-1"></i>Kode Tindakan / Terapi <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2 @error('idkode_tindakan_terapi') is-invalid @enderror" 
                                    id="idkode_tindakan_terapi" 
                                    name="idkode_tindakan_terapi" 
                                    required>
                                <option value="">-- Pilih Tindakan --</option>
                                @foreach($kodeTindakan as $kt)
                                    <option value="{{ $kt->idkode_tindakan_terapi }}" {{ old('idkode_tindakan_terapi') == $kt->idkode_tindakan_terapi ? 'selected' : '' }}>
                                        {{ $kt->kode }} - {{ $kt->deskripsi_tindakan_terapi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idkode_tindakan_terapi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="detail">
                                <i class="fas fa-clipboard mr-1"></i>Detail Tindakan
                            </label>
                            <textarea class="form-control @error('detail') is-invalid @enderror" 
                                      id="detail" 
                                      name="detail" 
                                      rows="4" 
                                      placeholder="Keterangan tambahan tentang tindakan...">{{ old('detail') }}</textarea>
                            @error('detail')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Catatan atau keterangan tambahan (opsional)</small>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('dokter.rekammedis.show', $rekamMedis->idrekam_medis) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fas fa-save mr-1"></i> Simpan Tindakan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: '-- Pilih Tindakan --'
        });
    });
</script>
@endpush
