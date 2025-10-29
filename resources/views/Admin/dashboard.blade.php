@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-blue-100 via-pink-50 to-pink-100 text-gray-800 font-poppins">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3 shadow-sm" 
         style="background: linear-gradient(to right, #2563eb, #7c3aed, #ec4899);">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">
                ⚙️ Dashboard Admin
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-white fw-semibold">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-center py-5">
        <div class="container">
            <h1 class="fw-bold mb-3 text-transparent bg-clip-text"
                style="background: linear-gradient(to right, #2563eb, #7c3aed, #ec4899);
                       -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Selamat Datang, Admin RSHP 🐾
            </h1>
            <p class="text-muted fs-5">
                Kelola data hewan, pemilik, serta layanan klinis dengan mudah melalui dashboard ini.
            </p>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="container py-5">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 text-center py-4">
                    <h5 class="fw-semibold text-primary">🐶 Jumlah Hewan</h5>
                    <h2 class="fw-bold">{{ $jumlahPet ?? 0 }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 text-center py-4">
                    <h5 class="fw-semibold text-success">👩‍⚕️ Jumlah Pemilik</h5>
                    <h2 class="fw-bold">{{ $jumlahPemilik ?? 0 }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 text-center py-4">
                    <h5 class="fw-semibold text-warning">📋 Jenis Hewan</h5>
                    <h2 class="fw-bold">{{ $jumlahJenis ?? 0 }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 text-center py-4">
                    <h5 class="fw-semibold text-danger">🩺 Rekam Medis</h5>
                    <h2 class="fw-bold">{{ $jumlahRekam ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabel Aktivitas -->
    <section class="container pb-5">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white fw-bold fs-5">
                🕒 Aktivitas Terbaru
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Aktivitas</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aktivitas as $i => $a)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $a->deskripsi }}</td>
                                <td>{{ $a->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada aktivitas terbaru</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>
@endsection