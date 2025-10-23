@extends('layout.main')

@section('title', 'Login | RSHP UNAIR')

@section('content')
<section class="login-section d-flex align-items-center justify-content-center py-5">
  <div class="login-card shadow-lg p-5 bg-white rounded-4" style="max-width: 420px; width: 100%;">
    <div class="text-center mb-4">
      <img src="{{ asset('gambar/unair_logo.png') }}" alt="Logo UNAIR" width="80" class="mb-3">
      <h4 class="fw-bold text-primary">Login RSHP UNAIR</h4>
      <p class="text-muted mb-0">Masuk untuk mengelola layanan dan data rumah sakit hewan.</p>
    </div>

    <form method="POST" action="{{ route('login.post') }}">
      @csrf

      <div class="mb-3 text-start">
        <label for="email" class="form-label fw-semibold text-secondary">Email</label>
        <input type="email" name="email" id="email" class="form-control form-control-lg rounded-3" placeholder="Masukkan email Anda" required>
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label fw-semibold text-secondary">Kata Sandi</label>
        <input type="password" name="password" id="password" class="form-control form-control-lg rounded-3" placeholder="Masukkan kata sandi" required>
      </div>

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label for="remember" class="form-check-label text-muted">Ingat saya</label>
        </div>
        <a href="#" class="text-decoration-none small text-primary">Lupa kata sandi?</a>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">Masuk</button>

      <div class="text-center mt-4">
        <p class="text-muted mb-0">Belum punya akun? <a href="#" class="text-primary fw-semibold text-decoration-none">Daftar sekarang</a></p>
      </div>
    </form>
  </div>
</section>
@endsection
