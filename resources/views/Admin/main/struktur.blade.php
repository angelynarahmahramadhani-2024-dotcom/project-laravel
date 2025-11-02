@extends('layout.main')

@section('title', 'Struktur Organisasi | RSHP UNAIR')

@section('content')
<section class="struktur-section py-5">
  <div class="container text-center">

    <!-- Logo + Judul -->
    <div class="logo-header">
      <img src="{{ asset('gambar/logo.png') }}" alt="Logo RSHP" class="logo-structure">
      <div class="judul-struktur">
        <h4 class="fw-bold text-uppercase">Struktur Pimpinan</h4>
        <h5 class="fw-bold text-uppercase">Rumah Sakit Hewan Pendidikan Universitas Airlangga</h5>
      </div>
      <img src="{{ asset('gambar/logo.png') }}" alt="Logo Unair" class="logo-structure">
    </div>

    <!-- Direktur Utama -->
    <div class="direktur-section">
      <h5 class="fw-bold text-uppercase">Direktur Utama</h5>
      <img src="{{ asset('gambar/angels.jpg') }}" alt="Direktur Utama">
      <p class="fw-semibold mb-0 mt-2">dr. Angelyna Rahmah, M.P., drh.</p>
    </div>

    <!-- Wakil Direktur -->
    <div class="wadir-section">
      <div class="wadir-box">
        <h6>Wakil Direktur 1</h6>
        <p class="desc">Pelayanan Medis, Pendidikan dan Penelitian</p>
        <img src="{{ asset('gambar/tata.jpg') }}" alt="Wakil Direktur 1">
        <p class="name">dr. Drefita Putri M.P., drh.</p>
      </div>

      <div class="wadir-box">
        <h6>Wakil Direktur 2</h6>
        <p class="desc">Sumber Daya Manusia, Sarana Prasarana dan Keuangan</p>
        <img src="{{ asset('gambar/zelvia.jpg') }}" alt="Wakil Direktur 2">
        <p class="name">dr. Zelvia Rani, M.Vet., drh.</p>
      </div>
    </div>

  </div>
</section>

<!-- ✨ STYLE -->
<style>
/* Layout utama */
.struktur-section {
  background-color: #ffffff;
  min-height: 100vh;
  padding-top: 120px;
  padding-bottom: 100px;
}

/* Header logo */
.logo-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  text-align: center;
  margin-bottom: 40px;
  flex-wrap: wrap;
}

.logo-structure {
  width: 130px;
  height: 130px;
  object-fit: contain;
}

/* Judul */
.judul-struktur {
  flex: 1;
  color: #1a237e;
  line-height: 1.5;
}

/* Direktur */
.direktur-section {
  display: flex;
  justify-content: center;
  padding-bottom: 60px;
  gap: 80px;
  flex-wrap: wrap;
}

.direktur-section img {
  width: 220px;
  height: 290px;
  object-fit: cover;
  border: 4px solid #1a237e;
  border-radius: 4px;
  margin-top: 10px;
  margin-left: 60px;
  justify-content: center;
}

.direktur-section h5 {
  font-weight: 700;
  text-transform: uppercase;
  color: #1a237e;
  margin-bottom: 5px;
  justify-content: center;
}

/* Wakil Direktur */
.wadir-section {
  display: flex;
  justify-content: center;
  gap: 80px;
  flex-wrap: wrap;
}

.wadir-box {
  text-align: center;
  max-width: 250px;
}

.wadir-box h6 {
  font-weight: 700;
  text-transform: uppercase;
  color: #1a237e;
  margin-bottom: 5px;
}

.wadir-box .desc {
  font-size: 0.9rem;
  color: #555;
  margin-bottom: 10px;
}

.wadir-box img {
  width: 220px;
  height: 290px;
  object-fit: cover;
  border: 4px solid #1a237e;
  border-radius: 4px;
}

.wadir-box .name {
  font-weight: 600;
  margin-top: 8px;
  color: #000;
}

/* Responsif */
@media (max-width: 768px) {
  .logo-header {
    flex-direction: column;
    gap: 1rem;
  }

  .wadir-section {
    flex-direction: column;
    gap: 40px;
  }
}
</style>
@endsection
