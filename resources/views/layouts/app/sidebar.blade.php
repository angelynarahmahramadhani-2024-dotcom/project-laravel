@php
    $role = $role ?? 'admin';
    $cfg = $cfg ?? [];
@endphp
<aside class="main-sidebar {{ $cfg['sidebar_class'] ?? 'sidebar-dark-primary' }} elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route($cfg['dashboard_route'] ?? 'home') }}" class="brand-link {{ $cfg['brand_class'] ?? '' }}">
        <i class="{{ $cfg['brand_icon'] ?? 'fas fa-paw' }} brand-image" style="font-size: 1.8rem; margin-left: 0.8rem; margin-top: 0.3rem;"></i>
        <span class="brand-text font-weight-light">{{ $cfg['title'] ?? 'Panel' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if($role == 'dokter')
                    <i class="fas fa-user-md" style="font-size: 2rem; color: #17a2b8;"></i>
                @elseif($role == 'perawat')
                    <i class="fas fa-user-nurse" style="font-size: 2rem; color: #28a745;"></i>
                @elseif($role == 'resepsionis')
                    <i class="fas fa-user-tie" style="font-size: 2rem; color: #ffc107;"></i>
                @elseif($role == 'pemilik')
                    <i class="fas fa-user" style="font-size: 2rem; color: #6c757d;"></i>
                @else
                    <i class="fas fa-user-shield" style="font-size: 2rem; color: #c2c7d0;"></i>
                @endif
            </div>
            <div class="info">
                @if($role == 'dokter')
                    <a href="{{ route('dokter.profil.index') }}" class="d-block">
                        {{ Auth::user()->nama ?? 'Dokter' }}
                    </a>
                @else
                    <a href="#" class="d-block">
                        {{ Auth::user()->nama ?? Auth::user()->name ?? ucfirst($role) }}
                    </a>
                @endif
                <small class="text-{{ $cfg['accent_color'] ?? 'primary' }}">
                    <i class="fas fa-circle text-success" style="font-size: 8px;"></i> Online
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                {{-- ============== ADMIN MENU ============== --}}
                @if($role == 'admin')
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
                @endif

                {{-- ============== DOKTER MENU ============== --}}
                @if($role == 'dokter')
                    <li class="nav-item">
                        <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
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

                {{-- ============== PERAWAT MENU ============== --}}
                @if($role == 'perawat')
                    <li class="nav-item">
                        <a href="{{ route('perawat.dashboard') }}" class="nav-link {{ request()->routeIs('perawat.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    {{-- Tambahkan menu perawat lainnya di sini --}}
                @endif

                {{-- ============== RESEPSIONIS MENU ============== --}}
                @if($role == 'resepsionis')
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.dashboard') }}" class="nav-link {{ request()->routeIs('resepsionis.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    {{-- Tambahkan menu resepsionis lainnya di sini --}}
                @endif

                {{-- ============== PEMILIK MENU ============== --}}
                @if($role == 'pemilik')
                    <li class="nav-item">
                        <a href="{{ route('pemilik.dashboard') }}" class="nav-link {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    {{-- Tambahkan menu pemilik lainnya di sini --}}
                @endif

                {{-- ============== LOGOUT (ALL ROLES) ============== --}}
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
