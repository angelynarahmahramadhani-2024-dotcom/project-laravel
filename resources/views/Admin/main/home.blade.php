@extends('layout.main')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="pt-8 pb-16 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block bg-white/20 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                    <i class="fas fa-hospital mr-2"></i>Rumah Sakit Hewan Pendidikan
                </span>
                <h1 class="text-5xl font-bold mb-6 leading-tight">Layanan Kesehatan Hewan Terpercaya & Edukatif</h1>
                <p class="text-xl mb-8 text-primary-100">Rumah sakit hewan pendidikan dengan fasilitas modern dan tenaga medis berpengalaman untuk kesehatan hewan peliharaan Anda</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('login') }}" class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                        <i class="fas fa-calendar-check mr-2"></i>Konsultasi Sekarang
                    </a>
                    <a href="{{ route('layanan') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary-600 transition">
                        <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="bg-white rounded-2xl p-4 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1576201836106-db1758fd1c97?w=600&h=400&fit=crop" alt="Veterinarian" class="rounded-xl w-full h-80 object-cover">
                    <div class="absolute -bottom-6 -left-6 bg-primary-500 text-white p-6 rounded-xl shadow-xl">
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
            <div class="text-center p-6 rounded-xl bg-primary-50 card-hover">
                <i class="fas fa-paw text-4xl text-primary-500 mb-3"></i>
                <p class="text-4xl font-bold text-primary-600">5000+</p>
                <p class="text-gray-600 mt-2 font-medium">Hewan Dirawat</p>
            </div>
            <div class="text-center p-6 rounded-xl bg-green-50 card-hover">
                <i class="fas fa-user-md text-4xl text-green-500 mb-3"></i>
                <p class="text-4xl font-bold text-green-600">50+</p>
                <p class="text-gray-600 mt-2 font-medium">Dokter Hewan</p>
            </div>
            <div class="text-center p-6 rounded-xl bg-yellow-50 card-hover">
                <i class="fas fa-smile text-4xl text-yellow-500 mb-3"></i>
                <p class="text-4xl font-bold text-yellow-600">98%</p>
                <p class="text-gray-600 mt-2 font-medium">Tingkat Kepuasan</p>
            </div>
            <div class="text-center p-6 rounded-xl bg-red-50 card-hover">
                <i class="fas fa-clock text-4xl text-red-500 mb-3"></i>
                <p class="text-4xl font-bold text-red-600">24/7</p>
                <p class="text-gray-600 mt-2 font-medium">Layanan Darurat</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="layanan" class="py-16 gradient-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-500 text-white px-4 py-1 rounded-full text-sm font-medium mb-3">
                <i class="fas fa-concierge-bell mr-1"></i> Layanan Kami
            </span>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Layanan Kesehatan Terbaik</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Kami menyediakan berbagai layanan lengkap untuk kesehatan hewan kesayangan Anda</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md card-hover border-t-4 border-primary-500">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-stethoscope text-2xl text-primary-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Pemeriksaan Rutin</h3>
                <p class="text-gray-600 mb-4">Pemeriksaan kesehatan lengkap untuk deteksi dini penyakit pada hewan peliharaan</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-primary-500 mr-2"></i>Check-up menyeluruh</li>
                    <li><i class="fas fa-check text-primary-500 mr-2"></i>Vaksinasi lengkap</li>
                    <li><i class="fas fa-check text-primary-500 mr-2"></i>Konsultasi nutrisi</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md card-hover border-t-4 border-blue-500">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-flask text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Laboratorium</h3>
                <p class="text-gray-600 mb-4">Fasilitas laboratorium modern untuk diagnosis yang akurat dan cepat</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-blue-500 mr-2"></i>Tes darah lengkap</li>
                    <li><i class="fas fa-check text-blue-500 mr-2"></i>Pemeriksaan mikroskopis</li>
                    <li><i class="fas fa-check text-blue-500 mr-2"></i>Hasil cepat & akurat</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md card-hover border-t-4 border-green-500">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-syringe text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Operasi & Bedah</h3>
                <p class="text-gray-600 mb-4">Prosedur bedah dengan peralatan canggih dan tim dokter berpengalaman</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Sterilisasi/kastrasi</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Operasi mayor & minor</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Perawatan pasca operasi</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md card-hover border-t-4 border-red-500">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-ambulance text-2xl text-red-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Gawat Darurat</h3>
                <p class="text-gray-600 mb-4">Layanan 24/7 untuk kondisi darurat hewan peliharaan Anda</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-red-500 mr-2"></i>Siaga 24 jam</li>
                    <li><i class="fas fa-check text-red-500 mr-2"></i>Tim medis siap</li>
                    <li><i class="fas fa-check text-red-500 mr-2"></i>Penanganan cepat</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md card-hover border-t-4 border-yellow-500">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-home text-2xl text-yellow-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Hotel Hewan</h3>
                <p class="text-gray-600 mb-4">Tempat penitipan yang aman dan nyaman untuk hewan kesayangan</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-yellow-500 mr-2"></i>Kandang bersih & nyaman</li>
                    <li><i class="fas fa-check text-yellow-500 mr-2"></i>Pengawasan 24 jam</li>
                    <li><i class="fas fa-check text-yellow-500 mr-2"></i>Aktivitas & bermain</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md card-hover border-t-4 border-indigo-500">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-graduation-cap text-2xl text-indigo-600"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Edukasi & Pelatihan</h3>
                <p class="text-gray-600 mb-4">Program pendidikan dan pelatihan untuk pemilik hewan</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><i class="fas fa-check text-indigo-500 mr-2"></i>Workshop perawatan</li>
                    <li><i class="fas fa-check text-indigo-500 mr-2"></i>Magang mahasiswa</li>
                    <li><i class="fas fa-check text-indigo-500 mr-2"></i>Seminar kesehatan</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="gradient-bg rounded-2xl p-12 text-white">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-4"><i class="fas fa-calendar-alt mr-3"></i>Buat Janji Temu</h2>
                    <p class="text-primary-100 mb-6">Jadwalkan kunjungan untuk kesehatan hewan peliharaan Anda. Tim kami siap membantu dengan penanganan terbaik.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-300"></i>
                            Konsultasi dengan dokter berpengalaman
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-300"></i>
                            Pemeriksaan menyeluruh dan diagnosis akurat
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-300"></i>
                            Follow-up dan perawatan berkelanjutan
                        </li>
                    </ul>
                    <a href="{{ route('login') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login untuk Reservasi
                    </a>
                </div>
                <div class="bg-white rounded-xl p-8 text-gray-900 shadow-2xl">
                    <h3 class="text-xl font-bold mb-6 text-center text-gray-800">
                        <i class="fas fa-phone-alt text-primary-500 mr-2"></i>Hubungi Kami
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-phone text-2xl text-primary-500 mr-4"></i>
                            <div>
                                <p class="text-sm text-gray-500">Telepon</p>
                                <p class="font-semibold">(031) 5992785</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-envelope text-2xl text-primary-500 mr-4"></i>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-semibold">rshp@fkh.unair.ac.id</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-map-marker-alt text-2xl text-primary-500 mr-4"></i>
                            <div>
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p class="font-semibold">Kampus C UNAIR, Surabaya</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-red-50 rounded-lg">
                            <i class="fas fa-ambulance text-2xl text-red-500 mr-4"></i>
                            <div>
                                <p class="text-sm text-gray-500">IGD 24 Jam</p>
                                <p class="font-semibold text-red-600">(031) 5992785</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="tentang" class="py-16 gradient-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=600&h=400&fit=crop" alt="About" class="rounded-2xl shadow-xl">
                <div class="absolute -bottom-6 -right-6 bg-primary-500 text-white p-6 rounded-xl shadow-xl">
                    <p class="text-3xl font-bold">50+</p>
                    <p class="text-sm">Tenaga Ahli</p>
                </div>
            </div>
            <div>
                <span class="inline-block bg-primary-500 text-white px-4 py-1 rounded-full text-sm font-medium mb-3">
                    <i class="fas fa-info-circle mr-1"></i> Tentang Kami
                </span>
                <h2 class="text-4xl font-bold mb-6 text-gray-800">RSHP Universitas Airlangga</h2>
                <p class="text-gray-600 mb-4">Rumah Sakit Hewan Pendidikan Universitas Airlangga adalah institusi kesehatan hewan yang berkomitmen memberikan pelayanan terbaik dengan pendekatan edukatif.</p>
                <p class="text-gray-600 mb-6">Kami menggabungkan perawatan klinis berkualitas tinggi dengan misi pendidikan untuk menciptakan generasi pemilik hewan yang lebih bertanggung jawab dan profesional di bidang kesehatan hewan.</p>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-white p-4 rounded-lg shadow card-hover">
                        <i class="fas fa-award text-3xl text-primary-500 mb-2"></i>
                        <p class="text-2xl font-bold text-primary-600">10+</p>
                        <p class="text-gray-600 text-sm">Tahun Beroperasi</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow card-hover">
                        <i class="fas fa-certificate text-3xl text-green-500 mb-2"></i>
                        <p class="text-2xl font-bold text-green-600">A</p>
                        <p class="text-gray-600 text-sm">Akreditasi</p>
                    </div>
                </div>
                <a href="{{ route('struktur') }}" class="btn-primary-custom inline-block text-white px-8 py-3 rounded-lg font-semibold">
                    <i class="fas fa-arrow-right mr-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
