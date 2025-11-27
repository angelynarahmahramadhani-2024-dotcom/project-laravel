@extends('layouts.lte.main')

@section('title', 'Edit Reservasi')

@section('page-title', 'Edit Reservasi')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.temudokter.index') }}">Temu Dokter</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt mr-2"></i>Form Edit Reservasi
                    </h3>
                </div>
                <form action="{{ route('resepsionis.temudokter.update', $temuDokter->idreservasi_dokter) }}" method="POST">
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

                        <!-- Info Reservasi -->
                        <div class="callout callout-warning">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>No. Urut:</strong> 
                                        <span class="badge badge-warning badge-lg">{{ $temuDokter->no_urut }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Status:</strong> 
                                        <span class="badge {{ $temuDokter->status_badge }}">{{ $temuDokter->status_label }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="idpet">Pet <span class="text-danger">*</span></label>
                            <select name="idpet" id="idpet" 
                                    class="form-control select2 @error('idpet') is-invalid @enderror" required>
                                <option value="">-- Pilih Pet --</option>
                                @foreach($pets as $pet)
                                    <option value="{{ $pet->idpet }}" 
                                            {{ old('idpet', $temuDokter->idpet) == $pet->idpet ? 'selected' : '' }}>
                                        {{ $pet->nama }} - {{ $pet->pemilik->user->nama ?? 'N/A' }} ({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
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
                                            {{ old('idrole_user', $temuDokter->idrole_user) == $dokter->idrole_user ? 'selected' : '' }}>
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
                                   value="{{ old('waktu_daftar', $temuDokter->waktu_daftar ? \Carbon\Carbon::parse($temuDokter->waktu_daftar)->format('Y-m-d\TH:i') : '') }}">
                            @error('waktu_daftar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" 
                                    class="form-control @error('status') is-invalid @enderror">
                                <option value="W" {{ old('status', $temuDokter->status) == 'W' ? 'selected' : '' }}>Menunggu</option>
                                <option value="P" {{ old('status', $temuDokter->status) == 'P' ? 'selected' : '' }}>Proses</option>
                                <option value="S" {{ old('status', $temuDokter->status) == 'S' ? 'selected' : '' }}>Selesai</option>
                                <option value="B" {{ old('status', $temuDokter->status) == 'B' ? 'selected' : '' }}>Batal</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keluhan">Keluhan / Catatan</label>
                            <textarea name="keluhan" id="keluhan" rows="3"
                                      class="form-control @error('keluhan') is-invalid @enderror"
                                      placeholder="Tuliskan keluhan atau catatan">{{ old('keluhan', $temuDokter->keluhan ?? '') }}</textarea>
                            @error('keluhan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('resepsionis.temudokter.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning float-right">
                            <i class="fas fa-save mr-1"></i> Update
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
