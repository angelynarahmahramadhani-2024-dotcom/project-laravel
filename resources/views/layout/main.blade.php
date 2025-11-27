<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | RSHP UNAIR</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#e3f2fd',
              100: '#bbdefb',
              200: '#90caf9',
              300: '#64b5f6',
              400: '#42a5f5',
              500: '#17a2b8',
              600: '#138496',
              700: '#117a8b',
              800: '#0c5460',
              900: '#073642',
            },
            secondary: {
              500: '#6c757d',
              600: '#5a6268',
            }
          }
        }
      }
    }
  </script>
  <style>
    body { font-family: 'Source Sans Pro', sans-serif; }
    .gradient-bg { 
      background: linear-gradient(135deg, #17a2b8 0%, #138496 50%, #0c5460 100%); 
    }
    .gradient-bg-light {
      background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    }
    .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .card-hover:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(23, 162, 184, 0.2); }
    .btn-primary-custom {
      background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
      transition: all 0.3s ease;
    }
    .btn-primary-custom:hover {
      background: linear-gradient(135deg, #138496 0%, #0c5460 100%);
      transform: translateY(-2px);
      box-shadow: 0 5px 20px rgba(23, 162, 184, 0.4);
    }
    .text-gradient {
      background: linear-gradient(135deg, #17a2b8 0%, #0c5460 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Navbar -->
  <nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center">
          <i class="fas fa-paw text-3xl text-primary-500"></i>
          <span class="ml-3 text-xl font-bold text-gray-800">RSHP UNAIR</span>
        </div>

        <div class="hidden md:flex items-center space-x-8">
          <a href="{{ route('landingpage') }}" class="text-gray-600 hover:text-primary-500 font-medium transition">
            <i class="fas fa-home mr-1"></i> Beranda
          </a>
          <a href="{{ route('layanan') }}" class="text-gray-600 hover:text-primary-500 font-medium transition">
            <i class="fas fa-stethoscope mr-1"></i> Layanan
          </a>
          <a href="{{ route('struktur') }}" class="text-gray-600 hover:text-primary-500 font-medium transition">
            <i class="fas fa-sitemap mr-1"></i> Struktur
          </a>
          <a href="{{ route('kontak') }}" class="text-gray-600 hover:text-primary-500 font-medium transition">
            <i class="fas fa-phone mr-1"></i> Kontak
          </a>

          @guest
            <a href="{{ route('login') }}" class="btn-primary-custom text-white px-6 py-2 rounded-lg font-semibold">
              <i class="fas fa-sign-in-alt mr-1"></i> Login
            </a>
          @else
            <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button type="submit" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300 font-medium transition">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
              </button>
            </form>
          @endguest
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button type="button" class="text-gray-600 hover:text-primary-500" id="mobile-menu-btn">
            <i class="fas fa-bars text-2xl"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden hidden" id="mobile-menu">
      <div class="px-4 py-3 space-y-2 bg-gray-50">
        <a href="{{ route('landingpage') }}" class="block px-3 py-2 text-gray-600 hover:text-primary-500 hover:bg-gray-100 rounded">
          <i class="fas fa-home mr-2"></i> Beranda
        </a>
        <a href="{{ route('layanan') }}" class="block px-3 py-2 text-gray-600 hover:text-primary-500 hover:bg-gray-100 rounded">
          <i class="fas fa-stethoscope mr-2"></i> Layanan
        </a>
        <a href="{{ route('struktur') }}" class="block px-3 py-2 text-gray-600 hover:text-primary-500 hover:bg-gray-100 rounded">
          <i class="fas fa-sitemap mr-2"></i> Struktur
        </a>
        <a href="{{ route('kontak') }}" class="block px-3 py-2 text-gray-600 hover:text-primary-500 hover:bg-gray-100 rounded">
          <i class="fas fa-phone mr-2"></i> Kontak
        </a>
        @guest
          <a href="{{ route('login') }}" class="block px-3 py-2 btn-primary-custom text-white text-center rounded">
            <i class="fas fa-sign-in-alt mr-1"></i> Login
          </a>
        @endguest
      </div>
    </div>
  </nav>

  <!-- Konten Halaman -->
  <main class="pt-16">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-4 gap-8">
        <div>
          <div class="flex items-center mb-4">
            <i class="fas fa-paw text-3xl text-primary-400"></i>
            <span class="ml-3 text-xl font-bold">RSHP UNAIR</span>
          </div>
          <p class="text-gray-400">Rumah Sakit Hewan Pendidikan Universitas Airlangga - Pelayanan kesehatan hewan terpercaya dengan pendekatan edukatif.</p>
        </div>
        <div>
          <h3 class="font-bold mb-4 text-primary-400"><i class="fas fa-concierge-bell mr-2"></i>Layanan</h3>
          <ul class="space-y-2 text-gray-400">
            <li><a href="{{ route('layanan') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> Pemeriksaan Umum</a></li>
            <li><a href="{{ route('layanan') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> Laboratorium</a></li>
            <li><a href="{{ route('layanan') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> Operasi & Bedah</a></li>
            <li><a href="{{ route('layanan') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> IGD 24 Jam</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold mb-4 text-primary-400"><i class="fas fa-link mr-2"></i>Link</h3>
          <ul class="space-y-2 text-gray-400">
            <li><a href="{{ route('landingpage') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> Beranda</a></li>
            <li><a href="{{ route('struktur') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> Struktur Organisasi</a></li>
            <li><a href="{{ route('kontak') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> Hubungi Kami</a></li>
            <li><a href="{{ route('login') }}" class="hover:text-primary-300 transition"><i class="fas fa-angle-right mr-1"></i> Login</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold mb-4 text-primary-400"><i class="fas fa-map-marker-alt mr-2"></i>Kontak</h3>
          <ul class="space-y-3 text-gray-400">
            <li class="flex items-start">
              <i class="fas fa-building mt-1 mr-3 text-primary-500"></i>
              <span>Kampus C Universitas Airlangga, Mulyorejo, Surabaya</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-phone mr-3 text-primary-500"></i>
              <span>(031) 5992785</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-envelope mr-3 text-primary-500"></i>
              <span>rshp@fkh.unair.ac.id</span>
            </li>
          </ul>
          <div class="flex space-x-3 mt-4">
            <a href="#" class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; {{ date('Y') }} <span class="text-primary-400">RSHP Universitas Airlangga</span>. All rights reserved. By <span class="text-primary-400">Angelyna</span>.</p>
      </div>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });
  </script>

</body>
</html>
