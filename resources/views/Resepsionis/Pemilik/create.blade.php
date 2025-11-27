@extends('layouts.lte.main')

@section('title', 'Tambah Pemilik')

@section('page-title', 'Tambah Pemilik')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.pemilik.index') }}">Pemilik</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-plus mr-2"></i>Form Tambah Pemilik
                    </h3>
                </div>
                <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
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

                        @if($users->isEmpty())
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <strong>Tidak ada user dengan role Pemilik yang tersedia.</strong><br>
                                Pastikan user sudah terdaftar dengan role "Pemilik" terlebih dahulu.
                            </div>
                        @else
                            <div class="card card-secondary card-outline mb-3">
                                <div class="card-header py-2">
                                    <h5 class="card-title mb-0"><i class="fas fa-user mr-2"></i>Pilih User</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="iduser">User (Role Pemilik) <span class="text-danger">*</span></label>
                                        <select name="iduser" id="iduser" 
                                                class="form-control select2 @error('iduser') is-invalid @enderror" required>
                                            <option value="">-- Pilih User --</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->iduser }}" 
                                                        {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                                                    {{ $user->nama }} - {{ $user->email }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('iduser')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <small class="text-muted">
                                            Hanya menampilkan user dengan role "Pemilik" yang belum terdaftar sebagai pemilik.
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary card-outline">
                                <div class="card-header py-2">
                                    <h5 class="card-title mb-0"><i class="fas fa-address-card mr-2"></i>Data Pemilik</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="no_wa">No. WhatsApp <span class="text-danger">*</span></label>
                                        <input type="text" name="no_wa" id="no_wa" 
                                               class="form-control @error('no_wa') is-invalid @enderror"
                                               value="{{ old('no_wa') }}" placeholder="Masukkan nomor WhatsApp" required>
                                        @error('no_wa')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="alamat" id="alamat" rows="3"
                                                  class="form-control @error('alamat') is-invalid @enderror"
                                                  placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        @if(!$users->isEmpty())
                            <button type="submit" class="btn btn-info float-right">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        @endif
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
        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: '-- Pilih User --'
        });
    });
</script>
@endpush
