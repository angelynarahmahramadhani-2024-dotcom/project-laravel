@extends('layout.main')

@section('title', 'Struktur Organisasi')

@section('content')
<!-- Hero Section -->
<section class="pt-8 pb-12 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block bg-white/20 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
            <i class="fas fa-sitemap mr-2"></i>Organisasi
        </span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Struktur Organisasi</h1>
        <p class="text-xl text-primary-100 max-w-2xl mx-auto">
            Tim profesional RSHP UNAIR yang berkomitmen memberikan layanan kesehatan hewan terbaik
        </p>
    </div>
</section>

<!-- Struktur Organisasi Chart -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Kepala -->
        <div class="text-center mb-12">
            <div class="inline-block">
                <div class="bg-primary-500 text-white rounded-xl p-6 shadow-lg max-w-sm mx-auto">
                    <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-user-tie text-4xl text-primary-500"></i>
                    </div>
                    <h3 class="text-xl font-bold">Kepala RSHP</h3>
                    <p class="text-primary-100">Dr. Nama Kepala, drh., M.Vet</p>
                    <p class="text-sm text-primary-200 mt-2">Pimpinan Rumah Sakit Hewan Pendidikan</p>
                </div>
            </div>
        </div>

        <!-- Garis Penghubung -->
        <div class="flex justify-center mb-8">
            <div class="w-1 h-12 bg-primary-300"></div>
        </div>

        <!-- Wakil / Sekretaris -->
        <div class="grid md:grid-cols-2 gap-8 max-w-3xl mx-auto mb-12">
            <div class="bg-white border-2 border-primary-500 rounded-xl p-6 shadow-lg text-center card-hover">
                <div class="w-20 h-20 bg-primary-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user-cog text-3xl text-primary-500"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Wakil Kepala</h3>
                <p class="text-primary-500 font-medium">Dr. Nama Wakil, drh., M.Vet</p>
                <p class="text-sm text-gray-500 mt-2">Wakil Pimpinan RSHP</p>
            </div>
            <div class="bg-white border-2 border-blue-500 rounded-xl p-6 shadow-lg text-center card-hover">
                <div class="w-20 h-20 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-clipboard-list text-3xl text-blue-500"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Sekretaris</h3>
                <p class="text-blue-500 font-medium">Nama Sekretaris, S.E.</p>
                <p class="text-sm text-gray-500 mt-2">Administrasi & Sekretariat</p>
            </div>
        </div>

        <!-- Garis Penghubung -->
        <div class="flex justify-center mb-8">
            <div class="w-1 h-12 bg-gray-300"></div>
        </div>

        <!-- Divisi -->
        <div class="text-center mb-8">
            <span class="inline-block bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-medium">
                <i class="fas fa-layer-group mr-2"></i>Divisi & Unit
            </span>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Divisi Medis -->
            <div class="bg-green-50 border-t-4 border-green-500 rounded-xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-green-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-stethoscope text-2xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 text-center mb-3">Divisi Medis</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-circle text-green-500 text-xs mr-2"></i>
                        Poliklinik Umum
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-green-500 text-xs mr-2"></i>
                        Poliklinik Spesialis
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-green-500 text-xs mr-2"></i>
                        IGD 24 Jam
                    </li>
                </ul>
            </div>

            <!-- Divisi Penunjang -->
            <div class="bg-blue-50 border-t-4 border-blue-500 rounded-xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-flask text-2xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 text-center mb-3">Divisi Penunjang</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-circle text-blue-500 text-xs mr-2"></i>
                        Laboratorium
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-blue-500 text-xs mr-2"></i>
                        Radiologi
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-blue-500 text-xs mr-2"></i>
                        Apotek
                    </li>
                </ul>
            </div>

            <!-- Divisi Rawat Inap -->
            <div class="bg-yellow-50 border-t-4 border-yellow-500 rounded-xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-yellow-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-bed text-2xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 text-center mb-3">Divisi Rawat Inap</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-circle text-yellow-500 text-xs mr-2"></i>
                        Kamar Rawat Inap
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-yellow-500 text-xs mr-2"></i>
                        ICU Hewan
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-yellow-500 text-xs mr-2"></i>
                        Isolasi
                    </li>
                </ul>
            </div>

            <!-- Divisi Administrasi -->
            <div class="bg-indigo-50 border-t-4 border-indigo-500 rounded-xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-indigo-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-file-invoice text-2xl text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 text-center mb-3">Divisi Administrasi</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-circle text-indigo-500 text-xs mr-2"></i>
                        Pendaftaran
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-indigo-500 text-xs mr-2"></i>
                        Keuangan
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-circle text-indigo-500 text-xs mr-2"></i>
                        Rekam Medis
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Tim Medis -->
<section class="py-16 gradient-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-500 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
                <i class="fas fa-user-md mr-2"></i>Tim Profesional
            </span>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Tim Dokter Hewan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Didukung oleh dokter hewan berpengalaman dan bersertifikat</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @for ($i = 1; $i <= 4; $i++)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-user-md text-6xl text-gray-400"></i>
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-gray-800">Dr. Dokter {{ $i }}</h3>
                    <p class="text-primary-500 font-medium text-sm">drh., M.Vet</p>
                    <p class="text-gray-500 text-sm mt-2">Spesialis Bedah</p>
                    <div class="flex justify-center space-x-3 mt-4">
                        <a href="#" class="text-gray-400 hover:text-primary-500 transition">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary-500 transition">
                            <i class="fas fa-envelope text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8 text-center">
            <div class="p-6">
                <div class="w-16 h-16 bg-primary-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user-md text-3xl text-primary-500"></i>
                </div>
                <h3 class="text-4xl font-bold text-primary-500">15+</h3>
                <p class="text-gray-600 mt-2">Dokter Hewan</p>
            </div>
            <div class="p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user-nurse text-3xl text-blue-500"></i>
                </div>
                <h3 class="text-4xl font-bold text-blue-500">25+</h3>
                <p class="text-gray-600 mt-2">Perawat</p>
            </div>
            <div class="p-6">
                <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-users text-3xl text-green-500"></i>
                </div>
                <h3 class="text-4xl font-bold text-green-500">50+</h3>
                <p class="text-gray-600 mt-2">Total Staff</p>
            </div>
            <div class="p-6">
                <div class="w-16 h-16 bg-yellow-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-award text-3xl text-yellow-500"></i>
                </div>
                <h3 class="text-4xl font-bold text-yellow-500">20+</h3>
                <p class="text-gray-600 mt-2">Tahun Pengalaman</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 gradient-bg text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Bergabunglah Dengan Tim Kami</h2>
        <p class="text-primary-100 mb-8">RSHP UNAIR selalu membuka kesempatan bagi profesional yang ingin berkontribusi dalam pelayanan kesehatan hewan.</p>
        <a href="{{ route('kontak') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-primary-50 transition">
            <i class="fas fa-paper-plane mr-2"></i>Hubungi Kami
        </a>
    </div>
</section>
@endsection
