@extends('layouts.lte.main')

@section('title', 'Profil Saya - Perawat')

@section('page-title', 'Profil Saya')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('perawat.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Profil Saya</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Profil Card -->
        <div class="col-md-4">
            <div class="card card-success card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <i class="fas fa-user-nurse fa-5x text-success mb-3"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                    <p class="text-muted text-center">
                        <i class="fas fa-user-nurse mr-1"></i> 
                        {{ $user->perawat->pendidikan ?? 'Perawat Klinik Hewan' }}
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b><i class="fas fa-envelope mr-2"></i>Email</b>
                            <span class="float-right">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-phone mr-2"></i>No. HP</b>
                            <span class="float-right">{{ $user->perawat->no_hp ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-venus-mars mr-2"></i>Jenis Kelamin</b>
                            <span class="float-right">{{ $user->perawat->jenis_kelamin_label ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-map-marker-alt mr-2"></i>Alamat</b>
                            <span class="float-right">{{ $user->perawat->alamat ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-user-tag mr-2"></i>Role</b>
                            <span class="float-right">
                                @foreach($user->roleUser as $ru)
                                    @if($ru->role)
                                        <span class="badge badge-success">{{ $ru->role->nama_role }}</span>
                                    @endif
                                @endforeach
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Info Tambahan -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-2"></i>Informasi
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Tanggal Hari Ini: <strong>{{ now()->translatedFormat('l, d F Y') }}</strong>
                    </p>
                    <p class="text-muted mb-0">
                        <i class="fas fa-clock mr-2"></i>
                        Waktu: <strong id="current-time">{{ now()->format('H:i:s') }}</strong>
                    </p>
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
                <form action="{{ route('perawat.profil.update') }}" method="POST">
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
                                   placeholder="Masukkan nama lengkap"
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
                                   placeholder="Masukkan email"
                                   required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>
                        <h5 class="text-success mb-3"><i class="fas fa-user-nurse mr-1"></i> Data Perawat</h5>

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
                                           value="{{ old('pendidikan', $user->perawat->pendidikan ?? '') }}"
                                           placeholder="Contoh: D3 Keperawatan">
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
                                           value="{{ old('no_hp', $user->perawat->no_hp ?? '') }}"
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
                                        <option value="L" {{ old('jenis_kelamin', $user->perawat->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $user->perawat->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
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
                                           value="{{ old('alamat', $user->perawat->alamat ?? '') }}"
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
                                        <i class="fas fa-key mr-1"></i>Password Baru
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password"
                                           placeholder="Masukkan password baru (min. 6 karakter)">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">
                                        <i class="fas fa-key mr-1"></i>Konfirmasi Password
                                    </label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation"
                                           placeholder="Ulangi password baru">
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

@push('scripts')
<script>
    // Update waktu real-time
    setInterval(function() {
        var now = new Date();
        var time = now.getHours().toString().padStart(2, '0') + ':' + 
                   now.getMinutes().toString().padStart(2, '0') + ':' + 
                   now.getSeconds().toString().padStart(2, '0');
        document.getElementById('current-time').textContent = time;
    }, 1000);
</script>
@endpush
