<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | RSHP UNAIR</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .card-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
  </style>
</head>
<body class="bg-gray-50">

  <!-- 🔹 Navbar -->
  <nav class="bg-white shadow-sm fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center">
          <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
          </svg>
          <span class="ml-2 text-xl font-bold text-gray-900">RSHP UNAIR</span>
        </div>

        <div class="hidden md:flex items-center space-x-8">
          <a href="{{ route('landingpage') }}" class="text-gray-700 hover:text-purple-600">Beranda</a>
          <a href="{{ route('layanan') }}" class="text-gray-700 hover:text-purple-600">Layanan</a>
          <a href="{{ route('struktur') }}" class="text-gray-700 hover:text-purple-600">Struktur</a>
          <a href="{{ route('kontak') }}" class="text-gray-700 hover:text-purple-600">Kontak</a>

          <!-- 🔹 Tombol Login -->
          @guest
            <a href="{{ route('login') }}" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
              Login
            </a>
          @else
            <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button type="submit" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                Logout
              </button>
            </form>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <!-- 🔹 Konten Halaman -->
  <main class="pt-20">
    @yield('content')
  </main>

  <!-- 🔹 Footer -->
  <footer class="bg-gray-900 text-white py-12 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-4 gap-8">
        <div>
          <div class="flex items-center mb-4">
            <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
            </svg>
            <span class="ml-2 text-xl font-bold">RSHP UNAIR</span>
          </div>
          <p class="text-gray-400">Rumah sakit hewan pendidikan terpercaya untuk kesehatan hewan peliharaan Anda.</p>
        </div>
        <div>
          <h3 class="font-bold mb-4">Layanan</h3>
          <ul class="space-y-2 text-gray-400">
            <li><a href="{{ route('layanan') }}" class="hover:text-white">Pemeriksaan</a></li>
            <li><a href="{{ route('layanan') }}" class="hover:text-white">Laboratorium</a></li>
            <li><a href="{{ route('layanan') }}" class="hover:text-white">Operasi & Bedah</a></li>
            <li><a href="{{ route('layanan') }}" class="hover:text-white">Darurat 24 Jam</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold mb-4">Informasi</h3>
          <ul class="space-y-2 text-gray-400">
            <li><a href="{{ route('struktur') }}" class="hover:text-white">Struktur</a></li>
            <li><a href="{{ route('kontak') }}" class="hover:text-white">Kontak</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold mb-4">Hubungi Kami</h3>
          <ul class="space-y-2 text-gray-400">
            <li>Jl. Kampus C, Mulyorejo, Surabaya</li>
            <li>Telp: (031) 555-1234</li>
            <li>Email: info@rshpunair.com</li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; 2025 RSHP Universitas Airlangga. By Angelyna.</p>
      </div>
    </div>
  </footer>

</body>
</html>