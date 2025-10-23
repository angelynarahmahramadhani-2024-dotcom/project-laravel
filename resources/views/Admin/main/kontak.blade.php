@extends('layout.main')

@section('title', 'Kontak | RSHP UNAIR')

@section('content')
<section class="contact-section py-5">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-3">Hubungi Kami</h2>
    <p class="text-muted mb-5">Kami siap membantu Anda mendapatkan pelayanan terbaik untuk hewan kesayangan 🐾</p>

    <div class="row justify-content-center g-4">
      <!-- Info Kontak -->
      <div class="col-md-4">
        <div class="contact-card p-4 shadow-sm rounded-4 bg-white h-100">
          <i class="bi bi-geo-alt-fill fs-1 text-primary mb-3"></i>
          <h6 class="fw-bold">Alamat</h6>
          <p class="text-muted">Jl. Ir. Soekarno No. 88, Surabaya</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-card p-4 shadow-sm rounded-4 bg-white h-100">
          <i class="bi bi-telephone-fill fs-1 text-primary mb-3"></i>
          <h6 class="fw-bold">Telepon</h6>
          <p class="text-muted">(031) 555-4321</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-card p-4 shadow-sm rounded-4 bg-white h-100">
          <i class="bi bi-envelope-fill fs-1 text-primary mb-3"></i>
          <h6 class="fw-bold">Email</h6>
          <p class="text-muted">info@rshp.unair.ac.id</p>
        </div>
      </div>
    </div>

    <!-- Peta Lokasi -->
    <div class="mt-5">
      <h4 class="fw-bold text-primary mb-3">Lokasi Kami</h4>
      <div class="ratio ratio-16x9 rounded-4 shadow-sm">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7410075551015!2d112.78555967476039!3d-7.270285392736687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1760689835375!5m2!1sid!2sid" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
      </div>
    </div>

    <!-- Form Pesan -->
    <div class="contact-form mt-5 text-start mx-auto" style="max-width: 600px;">
      <h4 class="fw-bold text-primary mb-3 text-center">Kirim Pesan</h4>
      <form>
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Masukkan nama Anda">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control rounded-3 shadow-sm" placeholder="Masukkan email Anda">
        </div>
        <div class="mb-3">
          <label class="form-label">Pesan</label>
          <textarea rows="4" class="form-control rounded-3 shadow-sm" placeholder="Tulis pesan Anda di sini"></textarea>
        </div>
        <button type="submit" class="btn btn-primary px-4 rounded-pill">Kirim Pesan</button>
      </form>
    </div>
  </div>
</section>
@endsection
