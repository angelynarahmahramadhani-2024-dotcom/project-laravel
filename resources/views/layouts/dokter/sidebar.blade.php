<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dokter.dashboard') }}" class="brand-link bg-info">
        <i class="fas fa-stethoscope brand-image" style="font-size: 1.8rem; margin-left: 0.8rem; margin-top: 0.3rem;"></i>
        <span class="brand-text font-weight-light">Panel Dokter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user-md" style="font-size: 2rem; color: #17a2b8;"></i>
            </div>
            <div class="info">
                <a href="{{ route('dokter.profil.index') }}" class="d-block">
                    {{ Auth::user()->nama ?? 'Dokter' }}
                </a>
                <small class="text-info">
                    <i class="fas fa-circle text-success" style="font-size: 8px;"></i> Online
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Header -->
                <li class="nav-header">LAYANAN</li>

                <!-- Data Pasien -->
                <li class="nav-item">
                    <a href="{{ route('dokter.pasien.index') }}" class="nav-link {{ request()->routeIs('dokter.pasien.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>Data Pasien</p>
                    </a>
                </li>

                <!-- Rekam Medis -->
                <li class="nav-item">
                    <a href="{{ route('dokter.rekammedis.index') }}" class="nav-link {{ request()->routeIs('dokter.rekammedis.*') || request()->routeIs('dokter.detailrekammedis.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-medical"></i>
                        <p>Rekam Medis</p>
                    </a>
                </li>

                <!-- Header -->
                <li class="nav-header">AKUN</li>

                <!-- Profil -->
                <li class="nav-item">
                    <a href="{{ route('dokter.profil.index') }}" class="nav-link {{ request()->routeIs('dokter.profil.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil Saya</p>
                    </a>
                </li>

                <!-- Logout -->
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
