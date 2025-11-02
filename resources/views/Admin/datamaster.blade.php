@extends('layout.dashboard')

@section('title', 'Data Master')

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-blue-100 via-pink-50 to-pink-100 text-gray-800 font-poppins">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg py-3 shadow-sm"
       style="background: linear-gradient(to right, #2563eb, #7c3aed, #ec4899);">
      <div class="container">
          <a class="navbar-brand fw-bold text-white" href="{{ route('admin.dashboard') }}">
              ← Kembali ke Dashboard
          </a>
          <span class="navbar-text text-white fw-semibold">⚙️ Data Master</span>
      </div>
  </nav>

  <!-- Hero -->
  <section class="text-center py-5">
      <div class="container">
          <h2 class="fw-bold mb-3 text-transparent bg-clip-text"
              style="background: linear-gradient(to right, #2563eb, #7c3aed, #ec4899);
                     -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
              Kelola Data Master RSHP 🐾
          </h2>
          <p class="text-muted fs-5">
              Pilih salah satu menu di bawah untuk mengelola data master sistem.
          </p>
      </div>
  </section>

  <!-- Card Menu -->
  <section class="container pb-5">
      <div class="row g-4 justify-content-center">

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3 text-primary">🐾</div>
                  <h5 class="fw-semibold">Jenis Hewan</h5>
                  <p class="text-muted">Kelola daftar jenis hewan.</p>
                  <a href="{{ route('jenishewan.index') }}" class="btn btn-outline-primary rounded-pill px-4">Kelola</a>
              </div>
          </div>

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3" style="color:#ec4899;">🧬</div>
                  <h5 class="fw-semibold">Ras Hewan</h5>
                  <p class="text-muted">Kelola daftar ras hewan.</p>
                  <a href="{{ route('rashewan.index') }}" class="btn rounded-pill px-4"
                     style="border:1px solid #ec4899; color:#ec4899;">Kelola</a>
              </div>
          </div>

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3 text-success">👩‍⚕️</div>
                  <h5 class="fw-semibold">Pemilik</h5>
                  <p class="text-muted">Data pemilik hewan terdaftar.</p>
                  <a href="{{ route('pemilik.index') }}" class="btn btn-outline-success rounded-pill px-4">Kelola</a>
              </div>
          </div>

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3 text-warning">🧍‍♂️</div>
                  <h5 class="fw-semibold">Kategori</h5>
                  <p class="text-muted">Kelola data kategori.</p>
                  <a href="{{ route('kategori.index') }}" class="btn btn-outline-warning rounded-pill px-4">Kelola</a>
              </div>
          </div>

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3" style="color:#7c3aed;">🩹</div>
                  <h5 class="fw-semibold">Kategori Klinis</h5>
                  <p class="text-muted">Data kategori klinis dan layanan medis.</p>
                  <a href="{{ route('kategoriKlinis.index') }}" class="btn rounded-pill px-4"
                     style="border:1px solid #7c3aed; color:#7c3aed;">Kelola</a>
              </div>
          </div>

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3 text-danger">💊</div>
                  <h5 class="fw-semibold">Kode Tindakan Terapi</h5>
                  <p class="text-muted">Kelola kode tindakan & terapi hewan.</p>
                  <a href="{{ route('KodeTindakanTerapi.index') }}" class="btn btn-outline-danger rounded-pill px-4">Kelola</a>
              </div>
          </div>

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3 text-warning">🧍‍♂️</div>
                  <h5 class="fw-semibold">Role & User Role</h5>
                  <p class="text-muted">Kelola data role pengguna.</p>
                  <a href="{{ route('role.index') }}" class="btn btn-outline-warning rounded-pill px-4">Kelola</a>
              </div>
          </div>

          <div class="col-md-4 col-lg-3">
              <div class="card shadow-sm border-0 rounded-4 text-center py-4 h-100">
                  <div class="fs-1 mb-3 text-warning">🧍‍♂️</div>
                  <h5 class="fw-semibold">Pet</h5>
                  <p class="text-muted">Kelola data hewan peliharaan.</p>
                  <a href="{{ route('pet.index') }}" class="btn btn-outline-warning rounded-pill px-4">Kelola</a>
              </div>
          </div>

      </div>
  </section>

</div>
@endsection
