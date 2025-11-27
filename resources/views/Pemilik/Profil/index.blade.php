@extends('layouts.lte.main')

@section('title', 'Profil Saya - Pemilik')

@section('page-title', 'Profil Saya')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Profil Saya</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Profil Card -->
        <div class="col-md-4">
            <div class="card card-secondary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <i class="fas fa-user-circle fa-5x text-secondary mb-3"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                    <p class="text-muted text-center">
                        <i class="fas fa-user mr-1"></i> Pemilik Hewan
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b><i class="fas fa-envelope mr-2"></i>Email</b>
                            <span class="float-right">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fab fa-whatsapp mr-2"></i>WhatsApp</b>
                            <span class="float-right">{{ $pemilik->no_wa ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-user-tag mr-2"></i>Role</b>
                            <span class="float-right">
                                @foreach($user->roleUser as $ru)
                                    @if($ru->role)
                                        <span class="badge badge-secondary">{{ $ru->role->nama_role }}</span>
                                    @endif
                                @endforeach
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-paw mr-2"></i>Jumlah Hewan</b>
                            <span class="float-right badge badge-info badge-pill">{{ $pets->count() }}</span>
                        </li>
                    </ul>

                    @if($pemilik && $pemilik->alamat)
                    <div class="p-3 bg-light rounded">
                        <strong><i class="fas fa-map-marker-alt mr-2"></i>Alamat:</strong>
                        <p class="mb-0 mt-1">{{ $pemilik->alamat }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Info Waktu -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-2"></i>Informasi
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Tanggal: <strong>{{ now()->translatedFormat('l, d F Y') }}</strong>
                    </p>
                    <p class="text-muted mb-0">
                        <i class="fas fa-clock mr-2"></i>
                        Waktu: <strong id="current-time">{{ now()->format('H:i:s') }}</strong>
                    </p>
                </div>
            </div>
        </div>

        <!-- Edit Profil & Hewan -->
        <div class="col-md-8">
            <!-- Form Edit -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit mr-2"></i>Edit Profil
                    </h3>
                </div>
                <form action="{{ route('pemilik.profil.update') }}" method="POST">
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

                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_wa">
                                        <i class="fab fa-whatsapp mr-1"></i>Nomor WhatsApp
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('no_wa') is-invalid @enderror" 
                                           id="no_wa" 
                                           name="no_wa" 
                                           value="{{ old('no_wa', $pemilik->no_wa ?? '') }}"
                                           placeholder="Contoh: 081234567890">
                                    @error('no_wa')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">
                                        <i class="fas fa-map-marker-alt mr-1"></i>Alamat
                                    </label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                              id="alamat" 
                                              name="alamat" 
                                              rows="2"
                                              placeholder="Masukkan alamat lengkap">{{ old('alamat', $pemilik->alamat ?? '') }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h5 class="text-muted mb-3">
                            <i class="fas fa-lock mr-1"></i> Ganti Password
                            <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small>
                        </h5>

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
                                           placeholder="Min. 6 karakter">
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
                        <a href="{{ route('pemilik.dashboard') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>

            <!-- Hewan Peliharaan -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Hewan Peliharaan Saya
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('pemilik.pet.index') }}" class="btn btn-tool">
                            <i class="fas fa-list"></i> Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($pets->count() > 0)
                    <div class="row">
                        @foreach($pets as $pet)
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card card-outline card-info h-100 mb-0">
                                <div class="card-body text-center py-3">
                                    <i class="fas fa-paw fa-2x text-info mb-2"></i>
                                    <h6 class="mb-1">{{ $pet->nama }}</h6>
                                    <small class="text-muted">
                                        {{ $pet->rasHewan->nama_ras ?? '-' }}
                                    </small>
                                    <div class="mt-2">
                                        <span class="badge {{ $pet->jenis_kelamin == 'L' ? 'badge-info' : 'badge-pink' }}" 
                                              style="{{ $pet->jenis_kelamin == 'P' ? 'background-color: #e83e8c; color: white;' : '' }}">
                                            <i class="fas {{ $pet->jenis_kelamin == 'L' ? 'fa-mars' : 'fa-venus' }}"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer text-center py-2">
                                    <a href="{{ route('pemilik.pet.show', $pet->idpet) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-paw fa-3x mb-3 d-block"></i>
                        Belum ada hewan peliharaan terdaftar
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Update waktu realtime
    function updateTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateTime, 1000);
</script>
@endpush
