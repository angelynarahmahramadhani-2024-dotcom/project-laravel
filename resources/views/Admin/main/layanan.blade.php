@extends('layout.main')

@section('title', 'Layanan | RSHP UNAIR')

@section('content')
<section class="layanan-section py-5">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-3">Layanan Kami</h2>
    <p class="text-muted mb-5">
      RSHP UNAIR memberikan berbagai layanan kesehatan hewan dengan fasilitas lengkap dan tenaga medis profesional 🐾
    </p>

    <div class="row g-4 justify-content-center">
      <!-- Poliklinik Umum -->
      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 shadow-sm rounded-4 bg-white h-100">
          <img src="{{ asset('gambar/poliklinik.png') }}" class="layanan-img mb-3" alt="Poliklinik Umum">
          <h5 class="fw-bold text-dark">Poliklinik Umum</h5>
          <p class="text-muted">Pemeriksaan umum oleh dokter hewan profesional dengan fasilitas modern.</p>
        </div>
      </div>

      <!-- Laboratorium -->
      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 shadow-sm rounded-4 bg-white h-100">
          <img src="{{ asset('gambar/lab.png') }}" class="layanan-img mb-3" alt="Laboratorium">
          <h5 class="fw-bold text-dark">Laboratorium</h5>
          <p class="text-muted">Diagnosis cepat dan akurat menggunakan peralatan laboratorium terbaru.</p>
        </div>
      </div>

      <!-- Rawat Inap -->
      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 shadow-sm rounded-4 bg-white h-100">
          <img src="{{ asset('gambar/rawatinap.png') }}" class="layanan-img mb-3" alt="Rawat Inap">
          <h5 class="fw-bold text-dark">Rawat Inap</h5>
          <p class="text-muted">Perawatan intensif untuk hewan yang membutuhkan pengawasan lebih lanjut.</p>
        </div>
      </div>

      <!-- Rehabilitasi -->
      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 shadow-sm rounded-4 bg-white h-100">
          <img src="{{ asset('gambar/rehabilitasi.png') }}" class="layanan-img mb-3" alt="Rehabilitasi">
          <h5 class="fw-bold text-dark">Rehabilitasi</h5>
          <p class="text-muted">Pemulihan pasca-operasi dan terapi fisiologis bagi hewan peliharaan.</p>
        </div>
      </div>

      <!-- Apotek Hewan -->
      <div class="col-md-6 col-lg-4">
        <div class="service-card p-4 shadow-sm rounded-4 bg-white h-100">
          <img src="{{ asset('gambar/apotek.png') }}" class="layanan-img mb-3" alt="Apotek Hewan">
          <h5 class="fw-bold text-dark">Apotek Hewan</h5>
          <p class="text-muted">Penyediaan obat dan vitamin hewan sesuai resep dokter RSHP UNAIR.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.layanan-section {
  background: linear-gradient(180deg, #fefdfb 0%, #f8fbff 100%);
}

.layanan-img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.08);
  transition: all 0.4s ease;
}

.service-card {
  transition: all 0.3s ease;
}

.service-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.service-card:hover .layanan-img {
  transform: scale(1.05);
  filter: brightness(90%);
}
</style>
@endsection
