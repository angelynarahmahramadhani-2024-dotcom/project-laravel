@php
    // Deteksi role user yang sedang login
    $userRole = null;
    if(Auth::check()) {
        $roleUser = Auth::user()->roleUser()->where('status', 1)->first();
        if($roleUser && $roleUser->role) {
            $userRole = strtolower($roleUser->role->nama_role);
        }
    }
    
    // Konfigurasi sidebar - SEMUA ROLE PAKAI TEMA TEAL
    $sidebarConfig = [
        'administrator' => [
            'brand_icon' => 'fas fa-paw',
            'brand_text' => 'Admin Panel',
            'user_icon' => 'fas fa-user-shield',
        ],
        'dokter' => [
            'brand_icon' => 'fas fa-stethoscope',
            'brand_text' => 'Panel Dokter',
            'user_icon' => 'fas fa-user-md',
        ],
        'perawat' => [
            'brand_icon' => 'fas fa-user-nurse',
            'brand_text' => 'Panel Perawat',
            'user_icon' => 'fas fa-user-nurse',
        ],
        'resepsionis' => [
            'brand_icon' => 'fas fa-concierge-bell',
            'brand_text' => 'Panel Resepsionis',
            'user_icon' => 'fas fa-user-tie',
        ],
        'pemilik' => [
            'brand_icon' => 'fas fa-user',
            'brand_text' => 'Panel Pemilik',
            'user_icon' => 'fas fa-user',
        ],
    ];
    $cfg = $sidebarConfig[$userRole] ?? $sidebarConfig['administrator'];
@endphp
<aside class="main-sidebar elevation-4" style="background: linear-gradient(180deg, #0c5460 0%, #17a2b8 100%);">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link" style="background: rgba(0,0,0,0.1); border-bottom: 1px solid rgba(255,255,255,0.1);">
        <i class="{{ $cfg['brand_icon'] }} brand-image text-white" style="font-size: 1.8rem; margin-left: 0.8rem; margin-top: 0.3rem;"></i>
        <span class="brand-text font-weight-light text-white">{{ $cfg['brand_text'] }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid rgba(255,255,255,0.2);">
            <div class="image">
                <i class="{{ $cfg['user_icon'] }}" style="font-size: 2rem; color: rgba(255,255,255,0.9);"></i>
            </div>
            <div class="info">
                @if($userRole == 'dokter')
                    <a href="{{ route('dokter.profil.index') }}" class="d-block text-white">{{ Auth::user()->nama ?? 'User' }}</a>
                @elseif($userRole == 'perawat')
                    <a href="{{ route('perawat.profil.index') }}" class="d-block text-white">{{ Auth::user()->nama ?? 'User' }}</a>
                @elseif($userRole == 'pemilik')
                    <a href="{{ route('pemilik.profil.index') }}" class="d-block text-white">{{ Auth::user()->nama ?? 'User' }}</a>
                @else
                    <a href="#" class="d-block text-white">{{ Auth::user()->nama ?? 'User' }}</a>
                @endif
                <small style="color: #20c997;">
                    <i class="fas fa-circle" style="font-size: 8px;"></i> Online
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                {{-- ============================================== --}}
                {{-- MENU ADMINISTRATOR --}}
                {{-- ============================================== --}}
                @if($userRole == 'administrator')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                    <li class="nav-header">DATA MASTER</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('admin.jenishewan.index') }}" class="nav-link {{ request()->routeIs('admin.jenishewan.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>Jenis Hewan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.rashewan.index') }}" class="nav-link {{ request()->routeIs('admin.rashewan.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-dog"></i>
                            <p>Ras Hewan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.kategoriKlinis.index') }}" class="nav-link {{ request()->routeIs('admin.kategoriKlinis.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-stethoscope"></i>
                            <p>Kategori Klinis</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.KodeTindakanTerapi.index') }}" class="nav-link {{ request()->routeIs('admin.KodeTindakanTerapi.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-syringe"></i>
                            <p>Kode Tindakan Terapi</p>
                        </a>
                    </li>
                    
                    <li class="nav-header">DATA UTAMA</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('admin.pemilik.index') }}" class="nav-link {{ request()->routeIs('admin.pemilik.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Pemilik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pet.index') }}" class="nav-link {{ request()->routeIs('admin.pet.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cat"></i>
                            <p>Pet</p>
                        </a>
                    </li>
                    
                    <li class="nav-header">MANAJEMEN USER</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.role.index') }}" class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Role</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.roleuser.index') }}" class="nav-link {{ request()->routeIs('admin.roleuser.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Role User</p>
                        </a>
                    </li>
                    
                    <li class="nav-header">DATA STAF</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('admin.dokter.index') }}" class="nav-link {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p>Data Dokter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.perawat.index') }}" class="nav-link {{ request()->routeIs('admin.perawat.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-nurse"></i>
                            <p>Data Perawat</p>
                        </a>
                    </li>
                @endif

                {{-- ============================================== --}}
                {{-- MENU DOKTER --}}
                {{-- ============================================== --}}
                @if($userRole == 'dokter')
                    <li class="nav-item">
                        <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">PENDAFTARAN</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('dokter.antrian.index') }}" class="nav-link {{ request()->routeIs('dokter.antrian.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Antrian Hari Ini</p>
                        </a>
                    </li>

                    <li class="nav-header">LAYANAN</li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.pasien.index') }}" class="nav-link {{ request()->routeIs('dokter.pasien.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dokter.rekammedis.index') }}" class="nav-link {{ request()->routeIs('dokter.rekammedis.*') || request()->routeIs('dokter.detailrekammedis.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-medical"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-header">AKUN</li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.profil.index') }}" class="nav-link {{ request()->routeIs('dokter.profil.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                @endif

                {{-- ============================================== --}}
                {{-- MENU PERAWAT --}}
                {{-- ============================================== --}}
                @if($userRole == 'perawat')
                    <li class="nav-item">
                        <a href="{{ route('perawat.dashboard') }}" class="nav-link {{ request()->routeIs('perawat.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">PENDAFTARAN</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('perawat.antrian.index') }}" class="nav-link {{ request()->routeIs('perawat.antrian.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Antrian Hari Ini</p>
                        </a>
                    </li>

                    <li class="nav-header">LAYANAN</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('perawat.pasien.index') }}" class="nav-link {{ request()->routeIs('perawat.pasien.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('perawat.rekammedis.index') }}" class="nav-link {{ request()->routeIs('perawat.rekammedis.*') || request()->routeIs('perawat.detailrekammedis.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-medical"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-header">AKUN</li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.profil.index') }}" class="nav-link {{ request()->routeIs('perawat.profil.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                @endif

                {{-- ============================================== --}}
                {{-- MENU RESEPSIONIS --}}
                {{-- ============================================== --}}
                @if($userRole == 'resepsionis')
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.dashboard') }}" class="nav-link {{ request()->routeIs('resepsionis.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">PENDAFTARAN</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.temudokter.antrian') }}" class="nav-link {{ request()->routeIs('resepsionis.temudokter.antrian') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Antrian Hari Ini</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.temudokter.index') }}" class="nav-link {{ request()->routeIs('resepsionis.temudokter.*') && !request()->routeIs('resepsionis.temudokter.antrian') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Temu Dokter</p>
                        </a>
                    </li>

                    <li class="nav-header">DATA</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.pemilik.index') }}" class="nav-link {{ request()->routeIs('resepsionis.pemilik.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Data Pemilik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.pet.index') }}" class="nav-link {{ request()->routeIs('resepsionis.pet.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>Data Pet</p>
                        </a>
                    </li>
                @endif

                {{-- ============================================== --}}
                {{-- MENU PEMILIK --}}
                {{-- ============================================== --}}
                @if($userRole == 'pemilik')
                    <li class="nav-item">
                        <a href="{{ route('pemilik.dashboard') }}" class="nav-link {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">LAYANAN</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('pemilik.jadwal.index') }}" class="nav-link {{ request()->routeIs('pemilik.jadwal.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Jadwal Temu Dokter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pemilik.rekammedis.index') }}" class="nav-link {{ request()->routeIs('pemilik.rekammedis.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-medical-alt"></i>
                            <p>Riwayat Medis</p>
                        </a>
                    </li>

                    <li class="nav-header">HEWAN SAYA</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('pemilik.pet.index') }}" class="nav-link {{ request()->routeIs('pemilik.pet.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>Hewan Peliharaan</p>
                        </a>
                    </li>

                    <li class="nav-header">AKUN</li>
                    
                    <li class="nav-item">
                        <a href="{{ route('pemilik.profil.index') }}" class="nav-link {{ request()->routeIs('pemilik.profil.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                @endif

                {{-- ============================================== --}}
                {{-- LOGOUT (SEMUA ROLE) --}}
                {{-- ============================================== --}}
                <li class="nav-header">SISTEM</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text-danger">Logout</p>
                    </a>
                    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>
