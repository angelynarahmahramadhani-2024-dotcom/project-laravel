@php
    // Menentukan role berdasarkan route atau variabel yang dikirim
    $role = $role ?? (request()->is('admin/*') ? 'admin' : (request()->is('dokter/*') ? 'dokter' : 'admin'));
    
    // Konfigurasi berdasarkan role
    $config = [
        'admin' => [
            'title' => 'Admin Panel',
            'sidebar_class' => 'sidebar-dark-primary',
            'brand_class' => '',
            'brand_icon' => 'fas fa-paw',
            'accent_color' => 'primary',
            'dashboard_route' => 'admin.dashboard',
        ],
        'dokter' => [
            'title' => 'Panel Dokter',
            'sidebar_class' => 'sidebar-dark-info',
            'brand_class' => 'bg-info',
            'brand_icon' => 'fas fa-stethoscope',
            'accent_color' => 'info',
            'dashboard_route' => 'dokter.dashboard',
        ],
        'perawat' => [
            'title' => 'Panel Perawat',
            'sidebar_class' => 'sidebar-dark-success',
            'brand_class' => 'bg-success',
            'brand_icon' => 'fas fa-user-nurse',
            'accent_color' => 'success',
            'dashboard_route' => 'perawat.dashboard',
        ],
        'resepsionis' => [
            'title' => 'Panel Resepsionis',
            'sidebar_class' => 'sidebar-dark-warning',
            'brand_class' => 'bg-warning',
            'brand_icon' => 'fas fa-concierge-bell',
            'accent_color' => 'warning',
            'dashboard_route' => 'resepsionis.dashboard',
        ],
        'pemilik' => [
            'title' => 'Panel Pemilik',
            'sidebar_class' => 'sidebar-dark-secondary',
            'brand_class' => 'bg-secondary',
            'brand_icon' => 'fas fa-user',
            'accent_color' => 'secondary',
            'dashboard_route' => 'pemilik.dashboard',
        ],
    ];
    
    $cfg = $config[$role] ?? $config['admin'];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | RSHP</title>
    
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css">
    
    <style>
        /* Dynamic accent color styles */
        .sidebar-dark-{{ $cfg['accent_color'] }} .nav-sidebar > .nav-item > .nav-link.active {
            background-color: var(--{{ $cfg['accent_color'] }});
        }
        .brand-link {
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .small-box .icon {
            font-size: 70px;
        }
        .card-{{ $cfg['accent_color'] }}.card-outline {
            border-top: 3px solid var(--{{ $cfg['accent_color'] }});
        }
        .select2-container--bootstrap4 .select2-selection {
            height: calc(2.25rem + 2px) !important;
        }
    </style>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.app.navbar', ['role' => $role, 'cfg' => $cfg])
        
        <!-- Sidebar -->
        @include('layouts.app.sidebar', ['role' => $role, 'cfg' => $cfg])
        
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page-title', 'Dashboard')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        @include('layouts.app.footer')
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Initialize Select2 with Bootstrap 4 theme
        $.fn.select2.defaults.set('theme', 'bootstrap4');
    </script>
    
    @stack('scripts')
</body>
</html>
