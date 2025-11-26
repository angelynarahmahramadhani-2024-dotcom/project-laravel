@php
    // Deteksi role user yang sedang login
    $userRole = null;
    if(Auth::check()) {
        $roleUser = Auth::user()->roleUser()->where('status', 1)->first();
        if($roleUser && $roleUser->role) {
            $userRole = strtolower($roleUser->role->nama_role);
        }
    }
    
    // Konfigurasi berdasarkan role
    $roleConfig = [
        'administrator' => ['dashboard' => 'admin.dashboard', 'label' => 'Administrator', 'color' => 'primary'],
        'dokter' => ['dashboard' => 'dokter.dashboard', 'label' => 'Dokter', 'color' => 'info'],
        'perawat' => ['dashboard' => 'perawat.dashboard', 'label' => 'Perawat', 'color' => 'success'],
        'resepsionis' => ['dashboard' => 'resepsionis.dashboard', 'label' => 'Resepsionis', 'color' => 'warning'],
        'pemilik' => ['dashboard' => 'pemilik.dashboard', 'label' => 'Pemilik', 'color' => 'secondary'],
    ];
    $config = $roleConfig[$userRole] ?? $roleConfig['administrator'];
@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route($config['dashboard']) }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-{{ $config['color'] }} navbar-badge">0</span>
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
        
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <span class="d-none d-md-inline ml-1">{{ Auth::user()->nama ?? 'User' }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    <strong>{{ Auth::user()->nama ?? 'User' }}</strong><br>
                    <small class="text-muted">{{ $config['label'] }}</small>
                </span>
                <div class="dropdown-divider"></div>
                
                @if($userRole == 'dokter')
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
