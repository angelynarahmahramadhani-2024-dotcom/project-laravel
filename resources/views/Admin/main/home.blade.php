@extends('layout.main')
@section('title', 'Home | RSHP UNAIR')

@section('content')

<!-- Hero Image -->
<section class="hero-top">
  <img src="{{ asset('gambar/rshp.png') }}" alt="RSHP UNAIR Hero Image" class="img-fluid w-100 hero-photo">
</section>

<!-- About Section -->
<section class="about-section py-5">
  <div class="container">
    <div class="row align-items-center g-5">  {{-- penting: align-items-center --}}
      <!-- Left collage -->
      <div class="col-md-5 d-flex justify-content-center">
        <div class="image-grid">
          <div class="image-box"><img src="{{ asset('gambar/dokter.png') }}" alt="Pemeriksaan Hewan"></div>
          <div class="image-box"><img src="{{ asset('gambar/hp.png') }}" alt="Dokter Hewan"></div>
          <div class="image-box"><img src="{{ asset('gambar/look.png') }}" alt="Pelayanan RSHP"></div>
          <div class="image-box"><img src="{{ asset('gambar/rs.png') }}" alt="Obat Hewan"></div>
        </div>
      </div>

      <!-- Right text -->
      <div class="col-md-7 about-text">
        <h2 class="fw-bold text-primary mb-3">Rumah Sakit Hewan Pendidikan</h2>
        <p class="text-muted fs-6 lh-lg">
          Rumah Sakit Hewan Pendidikan Universitas Airlangga merupakan pusat layanan kesehatan hewan
          dengan standar profesional dan fasilitas lengkap. Didirikan sebagai bagian dari Fakultas Kedokteran Hewan UNAIR,
          RSHP berperan penting dalam pendidikan, penelitian, dan pengabdian masyarakat di bidang kedokteran hewan.
        </p>
        <p class="text-muted fs-6 lh-lg">
          Didukung oleh dokter hewan berpengalaman serta tenaga medis profesional,
          RSHP UNAIR menyediakan layanan rawat jalan, rawat inap, laboratorium, serta operasi hewan kecil dan besar.
        </p>
        <a href="{{ route('layanan') }}" class="btn btn-primary px-4 mt-2 rounded-pill shadow-sm">
          Lihat Layanan Kami
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Video Profil RSHP -->
<section class="video-section py-5 text-center">
  <div class="container">
    <h2 class="fw-bold text-primary mb-4">Video Profil RSHP UNAIR</h2>
    <p class="text-muted mb-4">Kenali lebih dekat layanan dan fasilitas yang kami sediakan untuk kesejahteraan hewan kesayangan Anda.</p>
    <div class="ratio ratio-16x9 rounded-4 shadow-lg mx-auto" style="max-width: 800px;">
      <iframe src="https://www.youtube.com/embed/rCfvZPECZvE" 
              title="Video Profil RSHP UNAIR" 
              allowfullscreen>
      </iframe>
    </div>
  </div>
</section>

<!-- Fasilitas Unggulan RSHP -->
<section class="fasilitas-section py-5">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-4">Fasilitas Unggulan RSHP UNAIR</h2>
    <p class="text-muted mb-5">RSHP UNAIR dilengkapi dengan berbagai fasilitas modern untuk mendukung pelayanan terbaik bagi hewan kesayangan Anda.</p>

    <div class="row g-4 justify-content-center">

      <div class="col-md-4 col-lg-3">
        <div class="fasilitas-card shadow-sm">
          <img src="{{ asset('gambar/poliklinik.png') }}" class="fasilitas-img" alt="Poliklinik Umum">
          <h5 class="fw-semibold mt-3">Poliklinik Umum</h5>
          <p class="text-muted small">Pemeriksaan umum, diagnosis, dan terapi hewan oleh dokter profesional.</p>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="fasilitas-card shadow-sm">
          <img src="{{ asset('gambar/rawatinap.png') }}" class="fasilitas-img" alt="Rawat Inap">
          <h5 class="fw-semibold mt-3">Rawat Inap</h5>
          <p class="text-muted small">Fasilitas rawat inap nyaman dan aman untuk pemulihan hewan kesayangan.</p>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="fasilitas-card shadow-sm">
          <img src="{{ asset('gambar/lab.png') }}" class="fasilitas-img" alt="Laboratorium Diagnostik">
          <h5 class="fw-semibold mt-3">Laboratorium Diagnostik</h5>
          <p class="text-muted small">Pemeriksaan laboratorium lengkap untuk mendukung diagnosis akurat.</p>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="fasilitas-card shadow-sm">
          <img src="{{ asset('gambar/apotek.png') }}" class="fasilitas-img" alt="Apotek Hewan">
          <h5 class="fw-semibold mt-3">Apotek Hewan</h5>
          <p class="text-muted small">Menyediakan obat dan suplemen hewan dengan kualitas terpercaya.</p>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="fasilitas-card shadow-sm">
          <img src="{{ asset('gambar/rehabilitasi.png') }}" class="fasilitas-img" alt="Rehabilitasi & Fisioterapi">
          <h5 class="fw-semibold mt-3">Rehabilitasi & Fisioterapi</h5>
          <p class="text-muted small">Pemulihan gerak dan kesehatan fisik hewan setelah cedera.</p>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="fasilitas-card shadow-sm">
          <img src="{{ asset('gambar/ambulan.png') }}" class="fasilitas-img" alt="Ambulans Hewan">
          <h5 class="fw-semibold mt-3">Ambulans Hewan</h5>
          <p class="text-muted small">Layanan darurat untuk transportasi hewan dengan aman dan cepat.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!<!-- Lokasi RSHP UNAIR -->
<section class="lokasi-section py-5">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-4">Lokasi RSHP UNAIR</h2>
    <p class="text-muted mb-4">
      Kunjungi kami di kampus Universitas Airlangga untuk mendapatkan pelayanan terbaik bagi hewan kesayangan Anda.
    </p>
    <div class="ratio ratio-16x9 rounded-4 shadow-lg mx-auto" style="max-width: 900px;">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7410075551015!2d112.78555967476039!3d-7.270285392736687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1760689835375!5m2!1sid!2sid" 
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    </div>
  </div>
</section>
@endsection