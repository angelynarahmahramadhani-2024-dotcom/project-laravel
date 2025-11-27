@extends('layouts.lte.main')

@section('title', 'Dashboard Pemilik')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active"><i class="fas fa-home mr-1"></i> Dashboard</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Welcome Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background: linear-gradient(135deg, #17a2b8 0%, #0c5460 100%);">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="mr-4">
                                <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-paw fa-3x text-white"></i>
                                </div>
                            </div>
                            <div class="text-white">
                                <h3 class="mb-1">Selamat Datang, {{ $user->nama }}!</h3>
                                <p class="mb-0" style="opacity: 0.9;">{{ now()->translatedFormat('l, d F Y') }}</p>
                                <span class="badge badge-light mt-2"><i class="fas fa-heart mr-1"></i>Pemilik Hewan</span>
                            </div>
                        </div>
                        <div class="d-none d-md-block">
                            <i class="fas fa-dog fa-5x" style="color: rgba(255,255,255,0.2);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Boxes -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                <div class="inner text-white">
                    <h3>{{ $totalPet ?? 0 }}</h3>
                    <p>Hewan Peliharaan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paw"></i>
                </div>
                <a href="{{ route('pemilik.pet.index') }}" class="small-box-footer text-white">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);">
                <div class="inner text-white">
                    <h3>{{ $totalKunjungan ?? 0 }}</h3>
                    <p>Total Kunjungan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <a href="{{ route('pemilik.jadwal.index') }}" class="small-box-footer text-white">
                    Lihat Jadwal <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
                <div class="inner text-white">
                    <h3>{{ $totalRekamMedis ?? 0 }}</h3>
                    <p>Rekam Medis</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <a href="{{ route('pemilik.rekammedis.index') }}" class="small-box-footer text-white">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background: linear-gradient(135deg, #0c5460 0%, #17a2b8 100%);">
                <div class="inner text-white">
                    <h3>{{ $jadwalHariIni->count() ?? 0 }}</h3>
                    <p>Jadwal Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                <a href="#jadwalHariIni" class="small-box-footer text-white">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Jadwal Hari Ini -->
        <div class="col-lg-8">
            <div class="card card-secondary card-outline" id="jadwalHariIni">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-day mr-2"></i>Jadwal Hari Ini
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('pemilik.jadwal.index') }}" class="btn btn-tool">
                            <i class="fas fa-list"></i> Semua Jadwal
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 60px">No. Urut</th>
                                <th>Hewan</th>
                                <th>Dokter</th>
                                <th>Status</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwalHariIni ?? [] as $jadwal)
                            <tr>
                                <td>
                                    <span class="badge badge-lg badge-secondary" style="font-size: 1.2em;">
                                        {{ $jadwal->no_urut }}
                                    </span>
                                </td>
                                <td>
                                    <strong><i class="fas fa-paw text-info mr-1"></i>{{ $jadwal->pet->nama ?? '-' }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ $jadwal->pet->rasHewan->nama_ras ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <i class="fas fa-user-md text-info mr-1"></i>
                                        {{ $jadwal->roleUser->user->nama ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge {{ $jadwal->status_badge }}">
                                        {{ $jadwal->status_label }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('pemilik.jadwal.show', $jadwal->idreservasi_dokter) }}" 
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-calendar-times fa-3x mb-3 d-block"></i>
                                    Tidak ada jadwal hari ini
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Hewan Peliharaan Saya -->
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
                    <div class="row">
                        @forelse($pets ?? [] as $pet)
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="card card-outline card-info h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-paw fa-3x text-info mb-2"></i>
                                    <h5 class="mb-1">{{ $pet->nama }}</h5>
                                    <p class="text-muted mb-2">
                                        <small>
                                            {{ $pet->rasHewan->nama_ras ?? '-' }}
                                            <br>
                                            ({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})
                                        </small>
                                    </p>
                                    <span class="badge {{ $pet->jenis_kelamin == 'L' ? 'badge-info' : 'badge-pink' }}" 
                                          style="{{ $pet->jenis_kelamin == 'P' ? 'background-color: #e83e8c; color: white;' : '' }}">
                                        <i class="fas {{ $pet->jenis_kelamin == 'L' ? 'fa-mars' : 'fa-venus' }} mr-1"></i>
                                        {{ $pet->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}
                                    </span>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('pemilik.pet.show', $pet->idpet) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center text-muted py-4">
                            <i class="fas fa-paw fa-3x mb-3 d-block"></i>
                            Belum ada hewan peliharaan terdaftar
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Info Pemilik -->
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user mr-2"></i>Info Saya
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="fas fa-user-circle fa-4x text-secondary"></i>
                    </div>
                    <h5 class="text-center">{{ $user->nama }}</h5>
                    <p class="text-muted text-center mb-3">{{ $user->email }}</p>
                    
                    @if($pemilik ?? false)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fab fa-whatsapp text-success mr-2"></i>WhatsApp</span>
                            <span>{{ $pemilik->no_wa ?? '-' }}</span>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-map-marker-alt text-danger mr-2"></i>Alamat
                            <br>
                            <small class="text-muted">{{ $pemilik->alamat ?? '-' }}</small>
                        </li>
                    </ul>
                    @endif
                    
                    <div class="mt-3 text-center">
                        <a href="{{ route('pemilik.profil.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-user-edit mr-1"></i> Edit Profil
                        </a>
                    </div>
                </div>
            </div>

            <!-- Rekam Medis Terbaru -->
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-file-medical mr-2"></i>Rekam Medis Terbaru
                    </h3>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($rekamMedisTerbaru ?? [] as $rm)
                        <li class="list-group-item">
                            <a href="{{ route('pemilik.rekammedis.show', $rm->idrekam_medis) }}" class="text-dark">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong><i class="fas fa-paw text-warning mr-1"></i>{{ $rm->temuDokter->pet->nama ?? '-' }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar mr-1"></i>{{ $rm->created_at ? $rm->created_at->format('d/m/Y') : '-' }}
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            <i class="fas fa-user-md mr-1"></i>{{ $rm->dokter->nama ?? '-' }}
                                        </small>
                                    </div>
                                    <div>
                                        <i class="fas fa-chevron-right text-muted"></i>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @empty
                        <li class="list-group-item text-center text-muted py-4">
                            <i class="fas fa-file-medical fa-2x mb-2 d-block"></i>
                            Belum ada rekam medis
                        </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('pemilik.rekammedis.index') }}" class="text-warning">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-link mr-2"></i>Akses Cepat
                    </h3>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('pemilik.jadwal.index') }}" class="text-secondary d-flex align-items-center">
                                <i class="fas fa-calendar-alt mr-3"></i>
                                <span>Jadwal Temu Dokter</span>
                                <i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('pemilik.rekammedis.index') }}" class="text-secondary d-flex align-items-center">
                                <i class="fas fa-file-medical mr-3"></i>
                                <span>Rekam Medis</span>
                                <i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('pemilik.pet.index') }}" class="text-secondary d-flex align-items-center">
                                <i class="fas fa-paw mr-3"></i>
                                <span>Hewan Peliharaan</span>
                                <i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('pemilik.profil.index') }}" class="text-secondary d-flex align-items-center">
                                <i class="fas fa-user mr-3"></i>
                                <span>Profil Saya</span>
                                <i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
