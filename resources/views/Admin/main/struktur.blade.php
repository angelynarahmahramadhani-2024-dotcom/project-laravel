@extends('layout.main')

@section('title', 'Struktur Organisasi | RSHP UNAIR')

@section('content')
<section class="struktur-section py-5">
  <div class="container text-center">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
      <img src="{{ asset('gambar/logo.png') }}" alt="Logo RSHP" class="logo-structure mb-3">
      <div>
        <h4 class="fw-bold mb-1 text-uppercase">Struktur Pimpinan</h4>
        <h4 class="fw-bold text-uppercase">Rumah Sakit Hewan Pendidikan Universitas Airlangga</h4>
      </div>
      <img src="{{ asset('gambar/logo.png') }}" alt="Logo Unair" class="logo-structure mb-3">
    </div>

    <!-- Direktur -->
    <div class="mt-5 mb-4">
      <h5 class="fw-bold text-uppercase mb-3">Direktur</h5>
      <img src="{{ asset('gambar/angels.jpg') }}" alt="Direktur" class="profile-vertical mb-3">
      <p class="fw-semibold mb-0">dr. Angelyna Rahmah, M.P., drh.</p>
    </div>

    <!-- Dua Wakil Direktur -->
    <div class="row justify-content-center mt-4">
      <div class="col-md-4 mb-4">
        <h6 class="fw-bold text-uppercase mb-2">Wakil Direktur 1</h6>
        <p class="text-muted small mb-2">Pelayanan Medis, Pendidikan dan Penelitian</p>
        <img src="{{ asset('gambar/tata.jpg') }}" alt="Wakil Direktur 1" class="profile-vertical mb-2">
        <p class="fw-semibold mb-0">dr. Drefita Putri M.P., drh.</p>
      </div>

      <div class="col-md-4 mb-4">
        <h6 class="fw-bold text-uppercase mb-2">Wakil Direktur 2</h6>
        <p class="text-muted small mb-2">Sumber Daya Manusia, Sarana Prasarana dan Keuangan</p>
        <img src="{{ asset('gambar/zelvia.jpg') }}" alt="Wakil Direktur 2" class="profile-vertical mb-2">
        <p class="fw-semibold mb-0">dr. Zelvia Rani, M.Vet., drh.</p>
      </div>
    </div>
  </div>
</section>
@endsection