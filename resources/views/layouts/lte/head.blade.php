<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'RSHP') | RSHP</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css">
    
    <style>
        :root {
            --teal-primary: #17a2b8;
            --teal-dark: #0c5460;
            --teal-light: #20c997;
        }
        
        .small-box .icon { font-size: 70px; }
        .select2-container--bootstrap4 .select2-selection { height: calc(2.25rem + 2px) !important; }
        
        /* Sidebar Teal Theme */
        .main-sidebar .nav-sidebar .nav-link {
            color: rgba(255,255,255,0.8);
        }
        .main-sidebar .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .main-sidebar .nav-sidebar .nav-link.active {
            background: rgba(255,255,255,0.2) !important;
            color: #fff !important;
        }
        .main-sidebar .nav-header {
            color: rgba(255,255,255,0.6);
            padding: 0.5rem 1rem;
        }
        .main-sidebar .nav-icon {
            color: rgba(255,255,255,0.7);
        }
        .main-sidebar .nav-link.active .nav-icon,
        .main-sidebar .nav-link:hover .nav-icon {
            color: #fff;
        }
        .main-sidebar .nav-treeview {
            background: rgba(0,0,0,0.1);
        }
        .main-sidebar .nav-treeview .nav-link {
            color: rgba(255,255,255,0.7);
            padding-left: 2rem;
        }
        .main-sidebar .nav-treeview .nav-link:hover,
        .main-sidebar .nav-treeview .nav-link.active {
            color: #fff;
        }
        
        /* Navbar Teal Theme */
        .main-header.navbar {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border: none;
        }
        .main-header .nav-link,
        .main-header .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
        }
        .main-header .nav-link:hover {
            color: #fff !important;
        }
        .main-header .navbar-badge {
            background: #ffc107;
            color: #000;
        }
        
        /* Card Header Teal */
        .card-primary:not(.card-outline) > .card-header {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        }
        .card-primary.card-outline {
            border-top-color: #17a2b8;
        }
        .card-info:not(.card-outline) > .card-header {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        }
        .card-info.card-outline {
            border-top-color: #17a2b8;
        }
        
        /* Buttons Teal */
        .btn-primary {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border-color: #17a2b8;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #138496 0%, #0c5460 100%);
            border-color: #138496;
        }
        .btn-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background: linear-gradient(135deg, #138496 0%, #0c5460 100%);
            border-color: #138496;
        }
        
        /* Page Header */
        .content-header h1 {
            color: #0c5460;
        }
        
        /* Breadcrumb */
        .breadcrumb-item a {
            color: #17a2b8;
        }
        .breadcrumb-item.active {
            color: #0c5460;
        }
        
        /* DataTable Header */
        table.dataTable thead th {
            background: #17a2b8;
            color: #fff;
            border-color: #138496;
        }
        
        /* Badge Info */
        .badge-info {
            background: #17a2b8;
        }
        
        /* Progress Bar */
        .progress-bar {
            background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
        }
    </style>
    @stack('styles')
</head>
