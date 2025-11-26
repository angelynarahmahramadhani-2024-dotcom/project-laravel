@extends('layouts.lte.main')

@section('title', 'Edit Pemilik')

@section('page-title', 'Edit Pemilik')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.pemilik.index') }}">Pemilik</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit mr-2"></i>Form Edit Pemilik
                    </h3>
                </div>
                <form action="{{ route('resepsionis.pemilik.update', $pemilik->idpemilik) }}" method="POST">
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

                        <div class="card card-secondary card-outline mb-3">
                            <div class="card-header py-2">
                                <h5 class="card-title mb-0"><i class="fas fa-user mr-2"></i>Data Akun</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama" 
                                           class="form-control @error('nama') is-invalid @enderror"
                                           value="{{ old('nama', $pemilik->user->nama ?? '') }}" 
                                           placeholder="Masukkan nama lengkap" required>
                                    @error('nama')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" 
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', $pemilik->user->email ?? '') }}" 
                                           placeholder="Masukkan email" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small></label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" 
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Masukkan password baru">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card card-secondary card-outline">
                            <div class="card-header py-2">
                                <h5 class="card-title mb-0"><i class="fas fa-address-card mr-2"></i>Data Pemilik</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="telepon">Telepon <span class="text-danger">*</span></label>
                                    <input type="text" name="telepon" id="telepon" 
                                           class="form-control @error('telepon') is-invalid @enderror"
                                           value="{{ old('telepon', $pemilik->telepon) }}" 
                                           placeholder="Masukkan nomor telepon" required>
                                    @error('telepon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                    <textarea name="alamat" id="alamat" rows="3"
                                              class="form-control @error('alamat') is-invalid @enderror"
                                              placeholder="Masukkan alamat lengkap" required>{{ old('alamat', $pemilik->alamat) }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Info Pet -->
                        @if($pemilik->pets->count() > 0)
                        <div class="card card-info card-outline mt-3">
                            <div class="card-header py-2">
                                <h5 class="card-title mb-0"><i class="fas fa-paw mr-2"></i>Pet yang Dimiliki</h5>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Ras</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemilik->pets as $pet)
                                        <tr>
                                            <td>{{ $pet->nama }}</td>
                                            <td>{{ $pet->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                                            <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('resepsionis.pemilik.index') }}" class="btn btn-secondary">
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
        // Toggle password visibility
        $('#togglePassword').on('click', function() {
            const passwordInput = $('#password');
            const icon = $(this).find('i');
            
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
@endpush
