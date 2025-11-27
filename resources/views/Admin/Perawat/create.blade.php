@extends('layouts.lte.main')

@section('title', 'Tambah Data Perawat')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Data Perawat
                    </h3>
                </div>
                <form action="{{ route('admin.perawat.store') }}" method="POST">
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
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Semua user dengan role Perawat sudah memiliki data lengkap.
                                <a href="{{ route('admin.perawat.index') }}" class="alert-link">Kembali ke daftar</a>
                            </div>
                        @else
                            <div class="form-group">
                                <label for="id_user">
                                    <i class="fas fa-user mr-1"></i>Pilih User Perawat <span class="text-danger">*</span>
                                </label>
                                <select class="form-control select2 @error('id_user') is-invalid @enderror" 
                                        id="id_user" name="id_user" style="width: 100%;">
                                    <option value="">-- Pilih User --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->iduser }}" {{ old('id_user') == $user->iduser ? 'selected' : '' }}>
                                            {{ $user->nama }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_user')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">Hanya menampilkan user dengan role Perawat yang belum memiliki data</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendidikan">
                                            <i class="fas fa-graduation-cap mr-1"></i>Pendidikan
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('pendidikan') is-invalid @enderror" 
                                               id="pendidikan" 
                                               name="pendidikan" 
                                               value="{{ old('pendidikan') }}"
                                               placeholder="Contoh: D3 Keperawatan, S1 Keperawatan">
                                        @error('pendidikan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">
                                            <i class="fas fa-phone mr-1"></i>No. HP
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('no_hp') is-invalid @enderror" 
                                               id="no_hp" 
                                               name="no_hp" 
                                               value="{{ old('no_hp') }}"
                                               placeholder="08xxxxxxxxxx">
                                        @error('no_hp')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">
                                            <i class="fas fa-venus-mars mr-1"></i>Jenis Kelamin
                                        </label>
                                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                                id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="">-- Pilih --</option>
                                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">
                                            <i class="fas fa-map-marker-alt mr-1"></i>Alamat
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('alamat') is-invalid @enderror" 
                                               id="alamat" 
                                               name="alamat" 
                                               value="{{ old('alamat') }}"
                                               placeholder="Alamat lengkap">
                                        @error('alamat')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.perawat.index') }}" class="btn btn-secondary">
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

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
<style>
    .select2-container--bootstrap4 .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2({
        theme: 'bootstrap4',
        placeholder: '-- Pilih User --',
        allowClear: true
    });
});
</script>
@endpush
