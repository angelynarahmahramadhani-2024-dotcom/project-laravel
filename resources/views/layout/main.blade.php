<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'RSHP UNAIR')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #4a90e2;
      --secondary: #f9e4b7;
      --accent: #fffaf2;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--accent);
      color: #333;
      margin: 0;
    }

    /* Navbar */
    nav.navbar {
      background: linear-gradient(to right, var(--primary), var(--secondary));
      padding: 0.8rem 0;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
      font-weight: 700;
      color: #fff !important;
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 1.3rem;
    }

    nav a.nav-link {
      color: #fff !important;
      font-weight: 500;
      transition: 0.3s;
    }

    nav a.nav-link:hover,
    nav a.nav-link.fw-bold {
      text-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(180deg, #f0f7ff 0%, #fff 100%);
      text-align: center;
      padding: 100px 20px;
      border-radius: 15px;
      margin: 60px auto;
      max-width: 950px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
    }

    .hero h1 {
      font-weight: 700;
      color: var(--primary);
      font-size: 2.7rem;
    }

    .hero p {
      color: #555;
      font-size: 1.1rem;
      margin: 15px 0 25px;
    }

    .hero .btn-primary {
      background-color: var(--primary);
      border: none;
      border-radius: 30px;
      padding: 10px 25px;
      font-weight: 600;
      transition: 0.3s;
    }

    .hero .btn-primary:hover {
      background-color: #357ab8;
      transform: translateY(-2px);
    }

    /* Section Title */
    .section-title {
      text-align: center;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 30px;
      margin-top: 40px;
    }

    /* Service Card */
    .service-card {
      border: none;
      border-radius: 1rem;
      background-color: #fff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      padding: 25px;
      text-align: center;
      transition: 0.3s;
    }

    .service-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .service-card .emoji {
      font-size: 2rem;
      margin-bottom: 8px;
    }

/* Hero full photo */
.hero-full {
  position: relative;
  height: 80vh;
  overflow: hidden;
  border-radius: 12px;
  margin-bottom: 3rem;
}

.hero-full .hero-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(85%) saturate(90%);
  transition: transform 0.8s ease;
}

.hero-full:hover .hero-image {
  transform: scale(1.03);
}

/* About section */
.about-rshp {
  background: #fdfdfd;
}

.about-rshp h2 {
  font-size: 2rem;
  color: #1e3a8a;
}

.about-rshp p {
  font-size: 1.1rem;
  line-height: 1.7;
  color: #444;
}

/* Highlight section (subtle gradient) */
.highlight-bar {
  background: linear-gradient(to right, #f8fbff, #eef4ff);
  border-top: 1px solid #e2e8f0;
  border-bottom: 1px solid #e2e8f0;
}

.highlight-item {
  color: #1e3a8a;
  font-weight: 500;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.highlight-item i {
  font-size: 1.8rem;
  color: #2563eb;
  margin-bottom: 4px;
}

.highlight-item p {
  margin: 0;
  font-size: 0.95rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .hero-full {
    height: 60vh;
  }
  .about-rshp h2 {
    font-size: 1.6rem;
  }
  .about-rshp p {
    font-size: 1rem;
  }
}

    /* Footer */
    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #1e3a8a;
      color: white;
      text-align: center;
      padding: 12px 0;
      font-size: 0.95rem;
      z-index: 10;
      box-shadow: 0 -2px 6px rgba(0,0,0,0.1);
    }

    footer a {
      color: #fff;
      text-decoration: underline;
    }

    /* Pastikan about section rata tengah vertikal */
.about-section .row {
  display: flex;
  align-items: center;
}

/* Biar teks di kanan nggak terlalu turun */
.about-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 100%;
}

/* Sesuaikan tinggi gambar biar proporsional */
.image-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 10px;
  width: 100%;
  max-width: 360px;
}

.image-grid .image-box {
  width: 100%;
  aspect-ratio: 1 / 1;
  overflow: hidden;
  border-radius: 20px;
}

.image-grid .image-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease, filter 0.5s ease;
}

.image-grid .image-box:hover img {
  transform: scale(1.05);
  filter: brightness(90%);
}

/* Responsive tweak */
@media (max-width: 768px) {
  .about-section .row {
    flex-direction: column;
  }
  .image-grid {
    margin-bottom: 20px;
  }
}

/* Gradient background */
.contact-footer {
  background: linear-gradient(135deg, #2b67c7, #b9c3ff);
  border-radius: 20px 20px 0 0;
  margin-top: 60px;
}

/* Grid 2x2 info boxes */
.info-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  border-radius: 16px;
  overflow: hidden;
}

.info-box {
  padding: 30px 25px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  transition: all 0.3s ease;
}

.info-box:hover {
  transform: scale(1.03);
}

/* Quick links style */
.footer-link {
  color: #f8fafc;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-link:hover {
  color: #ffd166;
  text-decoration: underline;
}

/* Mobile responsive */
@media (max-width: 768px) {
  .info-grid {
    grid-template-columns: 1fr;
  }
  .info-box {
    border-radius: 0 !important;
  }
}

.fasilitas-card {
  background: #fff;
  border-radius: 18px;
  padding: 20px;
  transition: all 0.3s ease;
}

.fasilitas-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

.fasilitas-img {
  width: 100%;
  height: 160px;
  border-radius: 14px;
  object-fit: cover;
}

.fasilitas-card h5 {
  color: #2b67c7;
  margin-top: 12px;
}

@media (max-width: 768px) {
  .fasilitas-img {
    height: 130px;
  }
}

/* video section */
.video-section {
  background: linear-gradient(180deg, #fefcfb 0%, #f7f9ff 100%);
}

/* Lokasi */
.lokasi-section {
  background-color: #fefcfb;
}

/* Footer */
.rshp-footer {
  background: linear-gradient(135deg, #2b67c7, #b9c3ff);
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}

.rshp-footer h5 {
  color: #fff;
}

.rshp-footer p,
.rshp-footer li,
.rshp-footer a {
  color: #eaf2ff;
  transition: all 0.3s ease;
}

.rshp-footer a:hover {
  color: #ffd166;
  text-decoration: underline;
}

.footer-bottom {
  background: rgba(0, 0, 0, 0.15);
  color: #fff;
  border-top: 1px solid rgba(255,255,255,0.2);
  border-radius: 0 0 20px 20px;
}
.struktur-section {
  background: #fff;
  color: #000;
}

.logo-structure {
  height: 90px;
  width: auto;
}

.profile-vertical {
  width: 180px;
  height: 220px;
  object-fit: cover;
  border: 3px solid #cfe2ff;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  background: #eaf2ff;
  padding: 3px;
}

.struktur-section h4,
.struktur-section h5,
.struktur-section h6 {
  color: #002b7f;
}

.struktur-section p {
  color: #000;
}

@media (max-width: 768px) {
  .logo-structure {
    height: 60px;
  }
  .profile-vertical {
    width: 150px;
    height: 190px;
  }
}

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

/* Login Section */
.login-section {
  min-height: 80vh;
  background: linear-gradient(180deg, #fefcfb 0%, #f0f7ff 100%);
}

.login-card {
  border: 1px solid #eaeaea;
  transition: all 0.3s ease;
}

.login-card:hover {
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  transform: translateY(-3px);
}

.form-control:focus {
  border-color: #4a90e2;
  box-shadow: 0 0 8px rgba(74, 144, 226, 0.25);
}

.btn-primary {
  background: linear-gradient(to right, #4a90e2, #b0d0ff);
  border: none;
}

.btn-primary:hover {
  background: linear-gradient(to right, #3b7dd8, #9cc3ff);
  transform: translateY(-1px);
}

  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">🐾 RSHP UNAIR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home')?'fw-bold':'' }}">Home</a></li>
          <li class="nav-item"><a href="{{ route('struktur') }}" class="nav-link {{ request()->routeIs('struktur')?'fw-bold':'' }}">Struktur</a></li>
          <li class="nav-item"><a href="{{ route('layanan') }}" class="nav-link {{ request()->routeIs('layanan')?'fw-bold':'' }}">Layanan</a></li>
          <li class="nav-item"><a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak')?'fw-bold':'' }}">Kontak</a></li>
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login')?'fw-bold':'' }}">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container py-5">
    @yield('content')
  </main>

<footer class="text-center text-white py-3" style="background:#1e3a8a;">
  © 2025 Rumah Sakit Hewan Pendidikan Universitas Airlangga, made by angel🐾
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>