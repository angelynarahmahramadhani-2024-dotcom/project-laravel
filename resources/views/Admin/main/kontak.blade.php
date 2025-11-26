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

<style>
/* 💜 Background gradient sama kayak halaman Layanan */
.contact-section {
  background: linear-gradient(120deg, #6a5cf6 0%, #9a60f9 100%);
  color: white;
  padding-top: 6rem;
  padding-bottom: 6rem;
  text-align: center;
}

/* ✨ Judul dan deskripsi utama */
.contact-section h2 {
  font-size: 2.5rem;
  font-weight: 700;
  color: #ffffffff;
  margin-bottom: 1rem;
}

.contact-section p.text-muted {
  color: rgba(0, 0, 0, 1) !important;
  font-size: 1.05rem;
  margin-bottom: 3rem;
}

/* 🧭 Bagian Info Kontak Tanpa Card */
.row.justify-content-center.g-4 {
  max-width: 800px;
  margin: 0 auto 3rem;
}

.row.justify-content-center.g-4 .col-md-4 {
  background: rgba(255, 255, 255, 0.15);
  border-radius: 16px;
  padding: 2rem 1rem;
  color: #000000ff;
  backdrop-filter: blur(8px);
  transition: all 0.3s ease;
}

.row.justify-content-center.g-4 .col-md-4:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: translateY(-4px);
}

.row.justify-content-center.g-4 i {
  color: #000000ff;
  font-size: 2rem;
  margin-bottom: 0.8rem;
}

.row.justify-content-center.g-4 h6 {
  color: #000000ff;
  font-weight: 700;
  margin-bottom: 0.3rem;
}

.row.justify-content-center.g-4 p {
  color: #ffffffff;
  font-size: 0.95rem;
}

/* 🗺️ MAP — Lebar & di Tengah */
.ratio {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

.ratio iframe {
  width: 100%;
  height: 450px;
  border: 0;
}

/* 💌 Form Kontak */
.contact-form {
  background-color: #ffffff;
  border-radius: 20px;
  padding: 2.2rem;
  box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
  margin-top: 4rem;
  max-width: 650px;
}

.contact-form h4 {
  color: #6a5cf6;
  font-weight: 700;
}

.contact-form .form-label {
  font-weight: 600;
  color: #444;
}

.contact-form .form-control {
  border: 1px solid #ddd;
  border-radius: 10px;
  transition: all 0.3s ease;
}

.contact-form .form-control:focus {
  border-color: #6a5cf6;
  box-shadow: 0 0 6px rgba(106, 92, 246, 0.3);
}

.contact-form .btn-primary {
  background-color: #6a5cf6;
  border-color: #6a5cf6;
  transition: all 0.3s ease;
}

.contact-form .btn-primary:hover {
  background-color: #593df7;
  border-color: #593df7;
}

/* 📱 Responsif */
@media (max-width: 992px) {
  .contact-section {
    padding-top: 4rem;
    padding-bottom: 4rem;
  }

  .row.justify-content-center.g-4 {
    gap: 1rem;
  }

  .row.justify-content-center.g-4 .col-md-4 {
    margin-bottom: 1rem;
  }

  .ratio {
    max-width: 100%;
  }

  .contact-form {
    padding: 1.8rem;
  }
}
</style>


</section>
@endsection
