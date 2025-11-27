@extends('layouts.lte.main')

@section('title', 'Edit Data Dokter')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>Edit Data Dokter
                    </h3>
                </div>
                <form action="{{ route('admin.dokter.update', $dokter->id_dokter) }}" method="POST">
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
                            <label>
                                <i class="fas fa-user mr-1"></i>User Dokter
                            </label>
                            <input type="text" class="form-control" 
                                   value="{{ $dokter->user->nama }} ({{ $dokter->user->email }})" 
                                   readonly disabled>
                            <small class="text-muted">User tidak dapat diubah</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bidang_dokter">
                                        <i class="fas fa-stethoscope mr-1"></i>Bidang/Spesialisasi
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('bidang_dokter') is-invalid @enderror" 
                                           id="bidang_dokter" 
                                           name="bidang_dokter" 
                                           value="{{ old('bidang_dokter', $dokter->bidang_dokter) }}"
                                           placeholder="Contoh: Bedah, Umum, dll">
                                    @error('bidang_dokter')
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
                                           value="{{ old('no_hp', $dokter->no_hp) }}"
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
                                        <option value="L" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
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
                                           value="{{ old('alamat', $dokter->alamat) }}"
                                           placeholder="Alamat lengkap">
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
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
