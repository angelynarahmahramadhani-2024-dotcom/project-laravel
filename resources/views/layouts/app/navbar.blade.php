@php
    $role = $role ?? 'admin';
    $cfg = $cfg ?? [];
@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route($cfg['dashboard_route'] ?? 'home') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-{{ $cfg['accent_color'] ?? 'primary' }} navbar-badge">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Tidak ada notifikasi</span>
            </div>
        </li>
        
        <!-- Fullscreen -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <span class="d-none d-md-inline ml-1">{{ Auth::user()->nama ?? Auth::user()->name ?? 'User' }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    <strong>{{ Auth::user()->nama ?? Auth::user()->name ?? 'User' }}</strong>
                    <br>
                    <small class="text-muted">{{ ucfirst($role) }}</small>
                </span>
                <div class="dropdown-divider"></div>
                
                @if($role == 'dokter')
                    <a href="{{ route('dokter.profil.index') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Profil Saya
                    </a>
                    <div class="dropdown-divider"></div>
                @endif
                
                <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
