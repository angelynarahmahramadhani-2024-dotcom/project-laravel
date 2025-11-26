@extends('layouts.lte.main')

@section('title', 'Daftar Kunjungan Baru')

@section('page-title', 'Daftar Kunjungan Baru')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.temudokter.index') }}">Temu Dokter</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-plus mr-2"></i>Form Pendaftaran Kunjungan
                    </h3>
                </div>
                <form action="{{ route('resepsionis.temudokter.store') }}" method="POST">
                    @csrf
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
                            <label for="idpet">Pet <span class="text-danger">*</span></label>
                            <select name="idpet" id="idpet" 
                                    class="form-control select2 @error('idpet') is-invalid @enderror" required>
                                <option value="">-- Pilih Pet --</option>
                                @foreach($pets as $pet)
                                    <option value="{{ $pet->idpet }}" 
                                            {{ old('idpet') == $pet->idpet ? 'selected' : '' }}>
                                        {{ $pet->nama }} - {{ $pet->pemilik->user->nama ?? 'N/A' }} ({{ $pet->jenisHewan->nama_jenis_hewan ?? '-' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('idpet')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="idrole_user">Dokter <span class="text-danger">*</span></label>
                            <select name="idrole_user" id="idrole_user" 
                                    class="form-control select2 @error('idrole_user') is-invalid @enderror" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->idrole_user }}" 
                                            {{ old('idrole_user') == $dokter->idrole_user ? 'selected' : '' }}>
                                        {{ $dokter->user->nama ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idrole_user')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="waktu_daftar">Waktu Daftar</label>
                            <input type="datetime-local" name="waktu_daftar" id="waktu_daftar" 
                                   class="form-control @error('waktu_daftar') is-invalid @enderror"
                                   value="{{ old('waktu_daftar', now()->format('Y-m-d\TH:i')) }}">
                            @error('waktu_daftar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Kosongkan untuk menggunakan waktu saat ini</small>
                        </div>

                        <div class="form-group">
                            <label for="keluhan">Keluhan / Catatan</label>
                            <textarea name="keluhan" id="keluhan" rows="3"
                                      class="form-control @error('keluhan') is-invalid @enderror"
                                      placeholder="Tuliskan keluhan atau catatan">{{ old('keluhan') }}</textarea>
                            @error('keluhan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Info Antrian -->
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info-circle mr-2"></i>Informasi</h5>
                            <p class="mb-0">
                                Nomor urut akan diberikan secara otomatis berdasarkan antrian hari ini.
                                Status awal akan diset sebagai <span class="badge badge-secondary">Menunggu</span>.
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('resepsionis.temudokter.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning float-right">
                            <i class="fas fa-save mr-1"></i> Daftarkan
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
    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: function() {
                return $(this).data('placeholder');
            }
        });
    });
</script>
@endpush
