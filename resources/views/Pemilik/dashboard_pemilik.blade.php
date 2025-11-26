@extends('layout.main')

@section('title', 'Dashboard Pemilik')

@section('content')

<div class="max-w-7xl mx-auto p-8">

    <h1 class="text-3xl font-bold text-gray-800">
        🎉 Selamat Datang, Pemilik {{ Auth::user()->nama }}
    </h1>

    <p class="text-gray-500 mt-2">
        Ini adalah dashboard khusus untuk pemilik hewan.
    </p>

</div>

@endsection
