@extends('layout.main')

@section('title', 'Dashboard Perawat')

@section('content')

<div class="max-w-7xl mx-auto p-8">

    {{-- Header --}}
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-gray-800">
            👋 Selamat Datang, Perawat {{ Auth::user()->nama }}
        </h1>
        <p class="text-gray-500 mt-2">
            Berikut menu tugas perawat yang tersedia.
        </p>
    </div>

    {{-- Menu Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Card 1 --}}
        <a href="#"
           class="bg-white shadow-md p-6 rounded-xl border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 p-4 rounded-lg">
                    <svg class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Daftar Pasien Masuk</h2>
                    <p class="text-gray-500 text-sm">Lihat pasien yang harus ditangani hari ini.</p>
                </div>
            </div>
        </a>

        {{-- Card 2 --}}
        <a href="#"
           class="bg-white shadow-md p-6 rounded-xl border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-4 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.1 0-2 .9-2 2v1a2 2 0 01-.76 1.57l-1.24 1.06a3 3 0 002.82 5.19A5.99 5.99 0 0012 20a5.99 5.99 0 005.94-4.61 3 3 0 00-1.64-3.3l-1.24-1.06A2 2 0 0114 11v-1c0-1.1-.9-2-2-2z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Catat Tindakan Perawat</h2>
                    <p class="text-gray-500 text-sm">Input tindakan atau observasi perawat.</p>
                </div>
            </div>
        </a>

        {{-- Card 3 --}}
        <a href="#"
           class="bg-white shadow-md p-6 rounded-xl border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center space-x-4">
                <div class="bg-purple-100 p-4 rounded-lg">
                    <svg class="w-8 h-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 17v-2a4 4 0 014-4h0a4 4 0 014 4v2m-4-11a4 4 0 110 8 4 4 0 010-8z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Data Pasien Rawat Inap</h2>
                    <p class="text-gray-500 text-sm">Pantau kondisi pasien secara berkala.</p>
                </div>
            </div>
        </a>

    </div>

</div>

@endsection
