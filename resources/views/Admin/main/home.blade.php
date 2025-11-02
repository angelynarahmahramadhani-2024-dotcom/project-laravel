@extends('layout.main')

@section('title', 'Beranda')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetEdu Hospital - Rumah Sakit Hewan Pendidikan</title>
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
    <!-- Hero Section -->
    <section class="pt-24 pb-16 gradient-bg text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold mb-6">Layanan Kesehatan Hewan Terpercaya & Edukatif</h1>
                    <p class="text-xl mb-8 text-purple-100">Rumah sakit hewan pendidikan dengan fasilitas modern dan tenaga medis berpengalaman untuk kesehatan hewan peliharaan Anda</p>
                    <div class="flex gap-4">
                        <button class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100">Konsultasi Sekarang</button>
                        <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600">Pelajari Lebih</button>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-2xl p-8 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1576201836106-db1758fd1c97?w=600&h=400&fit=crop" alt="Veterinarian" class="rounded-lg w-full h-80 object-cover">
                        <div class="absolute -bottom-6 -left-6 bg-purple-600 text-white p-6 rounded-lg shadow-xl">
                            <p class="text-3xl font-bold">10+</p>
                            <p class="text-sm">Tahun Pengalaman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <p class="text-4xl font-bold text-purple-600">5000+</p>
                    <p class="text-gray-600 mt-2">Hewan Dirawat</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-purple-600">50+</p>
                    <p class="text-gray-600 mt-2">Dokter Hewan</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-purple-600">98%</p>
                    <p class="text-gray-600 mt-2">Tingkat Kepuasan</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-purple-600">24/7</p>
                    <p class="text-gray-600 mt-2">Layanan Darurat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Layanan Kesehatan Terbaik</h2>
                <p class="text-gray-600 text-lg">Kami menyediakan berbagai layanan untuk kesehatan hewan kesayangan Anda</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md card-hover">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Pemeriksaan Rutin</h3>
                    <p class="text-gray-600 mb-4">Pemeriksaan kesehatan lengkap untuk deteksi dini penyakit pada hewan peliharaan</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ Check-up menyeluruh</li>
                        <li>✓ Vaksinasi lengkap</li>
                        <li>✓ Konsultasi nutrisi</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md card-hover">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Laboratorium</h3>
                    <p class="text-gray-600 mb-4">Fasilitas laboratorium modern untuk diagnosis yang akurat dan cepat</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ Tes darah lengkap</li>
                        <li>✓ Pemeriksaan mikroskopis</li>
                        <li>✓ Hasil cepat & akurat</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md card-hover">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Operasi & Bedah</h3>
                    <p class="text-gray-600 mb-4">Prosedur bedah dengan peralatan canggih dan tim dokter berpengalaman</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ Sterilisasi/kastrasi</li>
                        <li>✓ Operasi mayor & minor</li>
                        <li>✓ Perawatan pasca operasi</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md card-hover">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Gawat Darurat</h3>
                    <p class="text-gray-600 mb-4">Layanan 24/7 untuk kondisi darurat hewan peliharaan Anda</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ Siaga 24 jam</li>
                        <li>✓ Tim medis siap</li>
                        <li>✓ Penanganan cepat</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md card-hover">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Hotel Hewan</h3>
                    <p class="text-gray-600 mb-4">Tempat penitipan yang aman dan nyaman untuk hewan kesayangan</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ Kandang bersih & nyaman</li>
                        <li>✓ Pengawasan 24 jam</li>
                        <li>✓ Aktivitas & bermain</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md card-hover">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Edukasi & Pelatihan</h3>
                    <p class="text-gray-600 mb-4">Program pendidikan dan pelatihan untuk pemilik hewan dan calon dokter hewan</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ Workshop perawatan</li>
                        <li>✓ Magang mahasiswa</li>
                        <li>✓ Seminar kesehatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl p-12 text-white">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-4xl font-bold mb-4">Buat Janji Temu</h2>
                        <p class="text-purple-100 mb-6">Jadwalkan kunjungan untuk kesehatan hewan peliharaan Anda. Tim kami siap membantu</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Konsultasi dengan dokter berpengalaman
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Pemeriksaan menyeluruh dan diagnosis akurat
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Follow-up dan perawatan berkelanjutan
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-8 text-gray-900">
                        <form>
                            <div class="mb-4">
                                <label class="block text-sm font-semibold mb-2">Nama Pemilik</label>
                                <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-600 focus:outline-none" placeholder="Nama lengkap">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-semibold mb-2">Nomor Telepon</label>
                                <input type="tel" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-600 focus:outline-none" placeholder="08xx-xxxx-xxxx">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-semibold mb-2">Jenis Hewan</label>
                                <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-600 focus:outline-none">
                                    <option>Pilih jenis hewan</option>
                                    <option>Anjing</option>
                                    <option>Kucing</option>
                                    <option>Kelinci</option>
                                    <option>Burung</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-semibold mb-2">Tanggal Kunjungan</label>
                                <input type="date" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-600 focus:outline-none">
                            </div>
                            <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700">Buat Janji Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=600&h=400&fit=crop" alt="About" class="rounded-2xl shadow-xl">
                </div>
                <div>
                    <h2 class="text-4xl font-bold mb-6">Tentang VetEdu Hospital</h2>
                    <p class="text-gray-600 mb-4">VetEdu Hospital adalah rumah sakit hewan pendidikan yang berkomitmen memberikan pelayanan kesehatan hewan terbaik dengan pendekatan edukatif. Kami menggabungkan perawatan klinis berkualitas tinggi dengan misi pendidikan untuk menciptakan generasi pemilik hewan yang lebih bertanggung jawab.</p>
                    <p class="text-gray-600 mb-6">Dengan tim dokter hewan berpengalaman dan fasilitas modern, kami siap memberikan perawatan komprehensif untuk berbagai jenis hewan peliharaan. Sebagai institusi pendidikan, kami juga menjadi tempat pembelajaran bagi mahasiswa kedokteran hewan.</p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <p class="text-3xl font-bold text-purple-600">10+</p>
                            <p class="text-gray-600">Tahun Beroperasi</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow">
                            <p class="text-3xl font-bold text-purple-600">50+</p>
                            <p class="text-gray-600">Tenaga Ahli</p>
                        </div>
                    </div>
                    <button class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700">Pelajari Lebih Lanjut</button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
@endsection