@extends('layouts.lte.main')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Welcome Banner -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-white mb-1">Selamat Datang, {{ Auth::user()->nama ?? 'Admin' }}! 👋</h2>
                        <p class="text-white-50 mb-0">Kelola sistem Rumah Sakit Hewan dengan mudah dan efisien.</p>
                    </div>
                    <div class="d-none d-md-block">
                        <i class="fas fa-hospital-user fa-4x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Small Box Stats -->
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jumlahPet ?? 0 }}</h3>
                <p>Total Hewan</p>
            </div>
            <div class="icon">
                <i class="fas fa-paw"></i>
            </div>
            <a href="{{ route('admin.pet.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $jumlahPemilik ?? 0 }}</h3>
                <p>Total Pemilik</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('admin.pemilik.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $jumlahJenis ?? 0 }}</h3>
                <p>Jenis Hewan</p>
            </div>
            <div class="icon">
                <i class="fas fa-dog"></i>
            </div>
            <a href="{{ route('admin.jenishewan.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $jumlahKategori ?? 0 }}</h3>
                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="fas fa-list-alt"></i>
            </div>
            <a href="{{ route('admin.kategori.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row">
    <!-- Pie Chart -->
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Distribusi Jenis Hewan
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="pieChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Bar Chart -->
    <div class="col-md-6">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-bar mr-1"></i>
                    Statistik Bulanan
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Line Chart Full Width -->
<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>
                    Tren Pendaftaran Hewan (6 Bulan Terakhir)
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Activity -->
<div class="row">
    <!-- Quick Actions -->
    <div class="col-md-4">
        <div class="card card-widget widget-user-2">
            <div class="widget-user-header bg-gradient-purple">
                <h3 class="widget-user-username ml-3">Menu Cepat</h3>
                <h5 class="widget-user-desc ml-3">Akses Fitur Utama</h5>
            </div>
            <div class="card-footer p-0">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.jenishewan.create') }}" class="nav-link">
                            <i class="fas fa-plus text-primary mr-2"></i> Tambah Jenis Hewan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.kategori.create') }}" class="nav-link">
                            <i class="fas fa-plus text-success mr-2"></i> Tambah Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pemilik.create') }}" class="nav-link">
                            <i class="fas fa-plus text-warning mr-2"></i> Tambah Pemilik
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pet.create') }}" class="nav-link">
                            <i class="fas fa-plus text-info mr-2"></i> Tambah Pet
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- System Info -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-gradient-teal">
                <h3 class="card-title text-white">
                    <i class="fas fa-server mr-1"></i> Info Sistem
                </h3>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fab fa-laravel text-danger mr-2"></i>Laravel Version</span>
                        <span class="badge badge-primary">{{ app()->version() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fab fa-php text-info mr-2"></i>PHP Version</span>
                        <span class="badge badge-info">{{ phpversion() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-clock text-warning mr-2"></i>Server Time</span>
                        <span class="badge badge-warning">{{ now()->format('H:i') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-calendar text-success mr-2"></i>Tanggal</span>
                        <span class="badge badge-success">{{ now()->format('d M Y') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Progress Card -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-gradient-orange">
                <h3 class="card-title text-white">
                    <i class="fas fa-tasks mr-1"></i> Progress Data
                </h3>
            </div>
            <div class="card-body">
                <div class="progress-group">
                    <span class="progress-text">Data Hewan</span>
                    <span class="float-right"><b>{{ $jumlahPet ?? 0 }}</b> data</span>
                    <div class="progress">
                        <div class="progress-bar bg-primary" style="width: {{ min(($jumlahPet ?? 0) * 10, 100) }}%"></div>
                    </div>
                </div>
                <div class="progress-group mt-3">
                    <span class="progress-text">Data Pemilik</span>
                    <span class="float-right"><b>{{ $jumlahPemilik ?? 0 }}</b> data</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: {{ min(($jumlahPemilik ?? 0) * 10, 100) }}%"></div>
                    </div>
                </div>
                <div class="progress-group mt-3">
                    <span class="progress-text">Jenis Hewan</span>
                    <span class="float-right"><b>{{ $jumlahJenis ?? 0 }}</b> data</span>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width: {{ min(($jumlahJenis ?? 0) * 20, 100) }}%"></div>
                    </div>
                </div>
                <div class="progress-group mt-3">
                    <span class="progress-text">Kategori</span>
                    <span class="float-right"><b>{{ $jumlahKategori ?? 0 }}</b> data</span>
                    <div class="progress">
                        <div class="progress-bar bg-danger" style="width: {{ min(($jumlahKategori ?? 0) * 20, 100) }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-gradient-purple {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    .bg-gradient-teal {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%) !important;
    }
    .bg-gradient-orange {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%) !important;
    }
    .small-box {
        border-radius: 10px;
        transition: transform 0.3s ease;
    }
    .small-box:hover {
        transform: translateY(-5px);
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .progress {
        height: 8px;
        border-radius: 5px;
    }
</style>
@endpush

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(function() {
    // Pie Chart
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieData = {
        labels: ['Anjing', 'Kucing', 'Burung', 'Kelinci', 'Lainnya'],
        datasets: [{
            data: [30, 25, 15, 10, 20],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
            borderWidth: 0
        }]
    };
    new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Bar Chart
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barChartData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Hewan Terdaftar',
            backgroundColor: 'rgba(60,141,188,0.8)',
            borderColor: 'rgba(60,141,188,1)',
            data: [28, 35, 42, 38, 50, 45]
        }, {
            label: 'Pemilik Baru',
            backgroundColor: 'rgba(40,167,69,0.8)',
            borderColor: 'rgba(40,167,69,1)',
            data: [15, 20, 18, 25, 30, 22]
        }]
    };
    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Line Chart
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
    var lineChartData = {
        labels: ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Pendaftaran Hewan',
            borderColor: '#3c8dbc',
            backgroundColor: 'rgba(60,141,188,0.2)',
            fill: true,
            tension: 0.4,
            data: [65, 59, 80, 81, 56, 72]
        }, {
            label: 'Kunjungan',
            borderColor: '#f56954',
            backgroundColor: 'rgba(245,105,84,0.2)',
            fill: true,
            tension: 0.4,
            data: [28, 48, 40, 55, 45, 60]
        }]
    };
    new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endpush
