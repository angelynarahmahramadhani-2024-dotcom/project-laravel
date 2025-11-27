@extends('layout.main')

@section('title', 'Layanan')

@section('content')
<!-- Hero Section -->
<section class="pt-8 pb-12 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block bg-white/20 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
            <i class="fas fa-concierge-bell mr-2"></i>Layanan Kami
        </span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Layanan Kesehatan Hewan</h1>
        <p class="text-xl text-primary-100 max-w-2xl mx-auto">
            RSHP UNAIR memberikan berbagai layanan kesehatan hewan dengan fasilitas lengkap dan tenaga medis profesional
        </p>
    </div>
</section>

<!-- Main Services -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Poliklinik -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-100">
                <div class="h-48 bg-primary-500 flex items-center justify-center">
                    <i class="fas fa-stethoscope text-6xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        <i class="fas fa-clinic-medical text-primary-500 mr-2"></i>Poliklinik Umum
                    </h3>
                    <p class="text-gray-600 mb-4">Pemeriksaan umum oleh dokter hewan profesional dengan fasilitas modern.</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><i class="fas fa-check-circle text-primary-500 mr-2"></i>Konsultasi kesehatan</li>
                        <li><i class="fas fa-check-circle text-primary-500 mr-2"></i>Pemeriksaan fisik lengkap</li>
                        <li><i class="fas fa-check-circle text-primary-500 mr-2"></i>Vaksinasi rutin</li>
                    </ul>
                </div>
            </div>

            <!-- Laboratorium -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-100">
                <div class="h-48 bg-blue-500 flex items-center justify-center">
                    <i class="fas fa-flask text-6xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        <i class="fas fa-microscope text-blue-500 mr-2"></i>Laboratorium
                    </h3>
                    <p class="text-gray-600 mb-4">Diagnosis cepat dan akurat menggunakan peralatan laboratorium terbaru.</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><i class="fas fa-check-circle text-blue-500 mr-2"></i>Tes darah lengkap</li>
                        <li><i class="fas fa-check-circle text-blue-500 mr-2"></i>Urinalisis</li>
                        <li><i class="fas fa-check-circle text-blue-500 mr-2"></i>Pemeriksaan parasit</li>
                    </ul>
                </div>
            </div>

            <!-- Rawat Inap -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-100">
                <div class="h-48 bg-green-500 flex items-center justify-center">
                    <i class="fas fa-bed text-6xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        <i class="fas fa-procedures text-green-500 mr-2"></i>Rawat Inap
                    </h3>
                    <p class="text-gray-600 mb-4">Perawatan intensif untuk hewan yang membutuhkan pengawasan lebih lanjut.</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Monitoring 24 jam</li>
                        <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Ruangan steril</li>
                        <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Perawatan intensif</li>
                    </ul>
                </div>
            </div>

            <!-- Bedah -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-100">
                <div class="h-48 bg-red-500 flex items-center justify-center">
                    <i class="fas fa-syringe text-6xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        <i class="fas fa-cut text-red-500 mr-2"></i>Operasi & Bedah
                    </h3>
                    <p class="text-gray-600 mb-4">Prosedur bedah dengan peralatan canggih dan tim dokter berpengalaman.</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><i class="fas fa-check-circle text-red-500 mr-2"></i>Sterilisasi/kastrasi</li>
                        <li><i class="fas fa-check-circle text-red-500 mr-2"></i>Bedah ortopedi</li>
                        <li><i class="fas fa-check-circle text-red-500 mr-2"></i>Bedah soft tissue</li>
                    </ul>
                </div>
            </div>

            <!-- Rehabilitasi -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-100">
                <div class="h-48 bg-yellow-500 flex items-center justify-center">
                    <i class="fas fa-hand-holding-medical text-6xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        <i class="fas fa-heartbeat text-yellow-500 mr-2"></i>Rehabilitasi
                    </h3>
                    <p class="text-gray-600 mb-4">Pemulihan pasca-operasi dan terapi fisiologis bagi hewan peliharaan.</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><i class="fas fa-check-circle text-yellow-500 mr-2"></i>Fisioterapi</li>
                        <li><i class="fas fa-check-circle text-yellow-500 mr-2"></i>Hydrotherapy</li>
                        <li><i class="fas fa-check-circle text-yellow-500 mr-2"></i>Pemulihan mobilitas</li>
                    </ul>
                </div>
            </div>

            <!-- Apotek -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-100">
                <div class="h-48 bg-indigo-500 flex items-center justify-center">
                    <i class="fas fa-pills text-6xl text-white"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        <i class="fas fa-prescription-bottle-alt text-indigo-500 mr-2"></i>Apotek Hewan
                    </h3>
                    <p class="text-gray-600 mb-4">Penyediaan obat dan vitamin hewan sesuai resep dokter RSHP UNAIR.</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><i class="fas fa-check-circle text-indigo-500 mr-2"></i>Obat resep dokter</li>
                        <li><i class="fas fa-check-circle text-indigo-500 mr-2"></i>Suplemen & vitamin</li>
                        <li><i class="fas fa-check-circle text-indigo-500 mr-2"></i>Produk perawatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Section -->
<section class="py-16 gradient-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-red-500 rounded-2xl p-8 md:p-12 text-white">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="inline-block bg-white/20 px-4 py-2 rounded-full text-sm font-medium mb-4">
                        <i class="fas fa-ambulance mr-2"></i>Layanan Darurat
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">IGD 24 Jam</h2>
                    <p class="text-red-100 mb-6">Layanan gawat darurat siap melayani 24 jam untuk kondisi darurat hewan peliharaan Anda.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3"></i>Tim medis berpengalaman siap siaga
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3"></i>Peralatan medis lengkap
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3"></i>Penanganan cepat dan tepat
                        </li>
                    </ul>
                </div>
                <div class="text-center">
                    <div class="bg-white rounded-xl p-8 text-gray-800">
                        <i class="fas fa-phone-alt text-5xl text-red-500 mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Hotline IGD</h3>
                        <p class="text-3xl font-bold text-red-500">(031) 5992785</p>
                        <p class="text-gray-500 mt-2">Siap 24 Jam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Butuh Konsultasi?</h2>
        <p class="text-gray-600 mb-8">Hubungi kami atau kunjungi langsung RSHP UNAIR untuk mendapatkan layanan terbaik bagi hewan kesayangan Anda.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('kontak') }}" class="btn-primary-custom text-white px-8 py-3 rounded-lg font-semibold">
                <i class="fas fa-phone mr-2"></i>Hubungi Kami
            </a>
            <a href="{{ route('login') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                <i class="fas fa-calendar-check mr-2"></i>Buat Janji
            </a>
        </div>
    </div>
</section>
@endsection
