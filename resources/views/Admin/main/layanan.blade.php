@extends('layout.main')

@section('title', 'Layanan | RSHP UNAIR')

@section('content')
<section class="layanan-section py-5">
  <div class="container text-center">
    <h2 class="fw-bold text-white mb-3">Layanan Kami</h2>
    <p class="text-light mb-5" style="max-width:700px; margin:auto;">
      RSHP UNAIR memberikan berbagai layanan kesehatan hewan dengan fasilitas lengkap
      dan tenaga medis profesional 🐾
    </p>

    <div class="layanan-grid">
      <div class="service-card">
        <img src="{{ asset('gambar/poliklinik.png') }}" class="layanan-img" alt="Poliklinik Umum">
        <h5>Poliklinik Umum</h5>
        <p>Pemeriksaan umum oleh dokter hewan profesional dengan fasilitas modern.</p>
      </div>

      <div class="service-card">
        <img src="{{ asset('gambar/lab.png') }}" class="layanan-img" alt="Laboratorium">
        <h5>Laboratorium</h5>
        <p>Diagnosis cepat dan akurat menggunakan peralatan laboratorium terbaru.</p>
      </div>

      <div class="service-card">
        <img src="{{ asset('gambar/rawatinap.png') }}" class="layanan-img" alt="Rawat Inap">
        <h5>Rawat Inap</h5>
        <p>Perawatan intensif untuk hewan yang membutuhkan pengawasan lebih lanjut.</p>
      </div>

      <div class="service-card">
        <img src="{{ asset('gambar/rehabilitasi.png') }}" class="layanan-img" alt="Rehabilitasi">
        <h5>Rehabilitasi</h5>
        <p>Pemulihan pasca-operasi dan terapi fisiologis bagi hewan peliharaan.</p>
      </div>

      <div class="service-card">
        <img src="{{ asset('gambar/apotek.png') }}" class="layanan-img" alt="Apotek Hewan">
        <h5>Apotek Hewan</h5>
        <p>Penyediaan obat dan vitamin hewan sesuai resep dokter RSHP UNAIR.</p>
      </div>
    </div>
  </div>
</section>

<style>
/* 💜 Background gradient */
.layanan-section {
  background: linear-gradient(120deg, #6a5cf6 0%, #9a60f9 100%);
  color: white;
  padding-top: 5rem;
  padding-bottom: 5rem;
}

/* 🌸 Grid Layout */
.layanan-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 1.8rem;
  justify-items: center;
}

/* 💎 Card */
.service-card {
  background-color: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  padding: 1.5rem;
  text-align: center;
  transition: all 0.3s ease;
  width: 100%;
  max-width: 270px;
}

.service-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
}

/* 🐾 Gambar */
.layanan-img {
  width: 100%;
  height: 160px;
  object-fit: contain;
  border-radius: 12px;
  background: #fff;
  margin-bottom: 1rem;
}

/* 🧁 Teks */
.service-card h5 {
  color: #333;
  font-weight: 600;
  font-size: 1.05rem;
  margin-bottom: 0.5rem;
}

.service-card p {
  color: #666;
  font-size: 0.9rem;
  margin: 0;
}

/* 📱 Responsif */
@media (max-width: 768px) {
  .layanan-grid {
    gap: 1.2rem;
  }
  .layanan-img {
    height: 130px;
  }
}
</style>

@endsection
