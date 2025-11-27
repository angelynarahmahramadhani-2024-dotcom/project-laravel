@extends('layout.main')

@section('title', 'Kontak')

@section('content')
<!-- Hero Section -->
<section class="pt-8 pb-12 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block bg-white/20 text-white px-4 py-2 rounded-full text-sm font-medium mb-4">
            <i class="fas fa-envelope mr-2"></i>Hubungi Kami
        </span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Kontak Kami</h1>
        <p class="text-xl text-primary-100 max-w-2xl mx-auto">
            Hubungi RSHP UNAIR untuk informasi layanan atau konsultasi kesehatan hewan peliharaan Anda
        </p>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-16 bg-white -mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-6 -mt-20 relative z-10">
            <!-- Alamat -->
            <div class="bg-white rounded-xl shadow-lg p-8 border-t-4 border-primary-500 card-hover">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-map-marker-alt text-3xl text-primary-500"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Alamat</h3>
                <p class="text-gray-600 leading-relaxed">
                    Kampus C Universitas Airlangga<br>
                    Jl. Mulyorejo, Surabaya<br>
                    Jawa Timur 60115
                </p>
            </div>

            <!-- Telepon -->
            <div class="bg-white rounded-xl shadow-lg p-8 border-t-4 border-blue-500 card-hover">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-phone-alt text-3xl text-blue-500"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Telepon</h3>
                <p class="text-gray-600">
                    <strong>Pendaftaran:</strong><br>
                    (031) 5992785<br><br>
                    <strong>IGD 24 Jam:</strong><br>
                    (031) 5992786
                </p>
            </div>

            <!-- Email & Sosmed -->
            <div class="bg-white rounded-xl shadow-lg p-8 border-t-4 border-green-500 card-hover">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-at text-3xl text-green-500"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Email & Media Sosial</h3>
                <p class="text-gray-600 mb-4">
                    rshp@fkh.unair.ac.id
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center text-white hover:bg-pink-600 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map & Contact Form -->
<section class="py-16 gradient-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Map -->
            <div>
                <div class="bg-white rounded-xl shadow-lg p-4 mb-6">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.634780938284!2d112.78364931477693!3d-7.266679094758876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa10ea2ae883%3A0xbe22c55d60ef09d7!2sUniversitas%20Airlangga%20-%20Kampus%20C!5e0!3m2!1sid!2sid!4v1635000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="350" 
                        style="border:0; border-radius: 12px;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>

                <!-- Jam Operasional -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">
                        <i class="fas fa-clock text-primary-500 mr-2"></i>Jam Operasional
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                            <span class="text-gray-600">Senin - Jumat</span>
                            <span class="font-semibold text-gray-800">08:00 - 20:00</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                            <span class="text-gray-600">Sabtu</span>
                            <span class="font-semibold text-gray-800">08:00 - 16:00</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                            <span class="text-gray-600">Minggu</span>
                            <span class="font-semibold text-gray-800">09:00 - 14:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">IGD</span>
                            <span class="font-semibold text-red-500">24 Jam</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Kirim Pesan</h3>
                    <p class="text-gray-600 mb-6">Isi formulir di bawah ini dan kami akan segera merespons pertanyaan Anda.</p>
                    
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user text-primary-500 mr-1"></i>Nama Lengkap
                                </label>
                                <input type="text" name="nama" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                    placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-primary-500 mr-1"></i>Email
                                </label>
                                <input type="email" name="email" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                    placeholder="contoh@email.com">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-phone text-primary-500 mr-1"></i>Nomor Telepon
                            </label>
                            <input type="tel" name="telepon" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-tag text-primary-500 mr-1"></i>Subjek
                            </label>
                            <select name="subjek" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition">
                                <option value="">Pilih Subjek</option>
                                <option value="konsultasi">Konsultasi Kesehatan</option>
                                <option value="jadwal">Informasi Jadwal</option>
                                <option value="layanan">Informasi Layanan</option>
                                <option value="kritik">Kritik & Saran</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-comment text-primary-500 mr-1"></i>Pesan
                            </label>
                            <textarea name="pesan" rows="5" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition resize-none"
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full btn-primary-custom text-white py-3 px-6 rounded-lg font-semibold">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block bg-primary-100 text-primary-600 px-4 py-2 rounded-full text-sm font-medium mb-4">
                <i class="fas fa-question-circle mr-2"></i>FAQ
            </span>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Pertanyaan yang Sering Diajukan</h2>
        </div>

        <div class="space-y-4">
            <div class="bg-gray-50 rounded-xl p-6">
                <h4 class="font-bold text-gray-800 mb-2">
                    <i class="fas fa-chevron-right text-primary-500 mr-2"></i>Bagaimana cara membuat janji dengan dokter hewan?
                </h4>
                <p class="text-gray-600 ml-6">Anda bisa mendaftar langsung melalui website, menghubungi nomor telepon pendaftaran, atau datang langsung ke RSHP UNAIR.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6">
                <h4 class="font-bold text-gray-800 mb-2">
                    <i class="fas fa-chevron-right text-primary-500 mr-2"></i>Apakah tersedia layanan darurat di luar jam operasional?
                </h4>
                <p class="text-gray-600 ml-6">Ya, layanan IGD kami beroperasi 24 jam untuk menangani kondisi darurat hewan peliharaan Anda.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6">
                <h4 class="font-bold text-gray-800 mb-2">
                    <i class="fas fa-chevron-right text-primary-500 mr-2"></i>Apa saja dokumen yang perlu dibawa saat kunjungan?
                </h4>
                <p class="text-gray-600 ml-6">Mohon membawa kartu identitas pemilik, rekam medis sebelumnya (jika ada), dan buku vaksinasi hewan.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6">
                <h4 class="font-bold text-gray-800 mb-2">
                    <i class="fas fa-chevron-right text-primary-500 mr-2"></i>Apakah tersedia layanan rawat inap untuk hewan?
                </h4>
                <p class="text-gray-600 ml-6">Ya, kami menyediakan fasilitas rawat inap dengan pengawasan 24 jam oleh tim medis profesional.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 gradient-bg text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Segera?</h2>
        <p class="text-primary-100 mb-8">Tim kami siap membantu Anda 24/7 untuk kondisi darurat hewan peliharaan.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="tel:0315992786" class="inline-flex items-center bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-primary-50 transition">
                <i class="fas fa-phone mr-2"></i>Hubungi IGD
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center bg-green-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-600 transition">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
