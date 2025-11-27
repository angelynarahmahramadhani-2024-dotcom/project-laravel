@extends('layouts.lte.main')

@section('title', 'Profil Saya - Dokter')

@section('page-title', 'Profil Saya')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Profil Saya</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Profil Card -->
        <div class="col-md-4">
            <div class="card card-info card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <i class="fas fa-user-md fa-5x text-info mb-3"></i>
                    </div>

                    <h3 class="profile-username text-center">Dr. {{ $user->nama }}</h3>

                    <p class="text-muted text-center">
                        <i class="fas fa-stethoscope mr-1"></i> 
                        {{ $user->dokter->bidang_dokter ?? 'Dokter Hewan' }}
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b><i class="fas fa-envelope mr-2"></i>Email</b>
                            <span class="float-right">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-phone mr-2"></i>No. HP</b>
                            <span class="float-right">{{ $user->dokter->no_hp ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-venus-mars mr-2"></i>Jenis Kelamin</b>
                            <span class="float-right">{{ $user->dokter->jenis_kelamin_label ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-map-marker-alt mr-2"></i>Alamat</b>
                            <span class="float-right">{{ $user->dokter->alamat ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-user-tag mr-2"></i>Role</b>
                            <span class="float-right">
                                @foreach($user->roleUser as $ru)
                                    @if($ru->role)
                                        <span class="badge badge-info">{{ $ru->role->nama_role }}</span>
                                    @endif
                                @endforeach
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Edit Profil -->
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit mr-2"></i>Edit Profil
                    </h3>
                </div>
                <form action="{{ route('dokter.profil.update') }}" method="POST">
                    @csrf
                    
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                            </div>
                        @endif

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

                        <h5 class="text-info mb-3"><i class="fas fa-user mr-1"></i> Data Akun</h5>
                        
                        <div class="form-group">
                            <label for="nama">
                                <i class="fas fa-user mr-1"></i>Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama', $user->nama) }}"
                                   required>
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope mr-1"></i>Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}"
                                   required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>
                        <h5 class="text-success mb-3"><i class="fas fa-user-md mr-1"></i> Data Dokter</h5>

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
                                           value="{{ old('bidang_dokter', $user->dokter->bidang_dokter ?? '') }}"
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
                                           value="{{ old('no_hp', $user->dokter->no_hp ?? '') }}"
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
                                            id="jenis_kelamin" 
                                            name="jenis_kelamin">
                                        <option value="">-- Pilih --</option>
                                        <option value="L" {{ old('jenis_kelamin', $user->dokter->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $user->dokter->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
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
                                           value="{{ old('alamat', $user->dokter->alamat ?? '') }}"
                                           placeholder="Alamat lengkap">
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h5 class="text-warning mb-3"><i class="fas fa-lock mr-1"></i> Ubah Password</h5>
                        <p class="text-muted">
                            <i class="fas fa-info-circle mr-1"></i>
                            Kosongkan password jika tidak ingin mengubah
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">
                                        <i class="fas fa-lock mr-1"></i>Password Baru
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Masukkan password baru...">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">Minimal 6 karakter</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">
                                        <i class="fas fa-lock mr-1"></i>Konfirmasi Password
                                    </label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Ulangi password baru...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
