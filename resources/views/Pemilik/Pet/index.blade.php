@extends('layouts.lte.main')

@section('title', 'Hewan Peliharaan - Pemilik')

@section('page-title', 'Hewan Peliharaan Saya')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Hewan Peliharaan</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Daftar Hewan Peliharaan Saya
                    </h3>
                </div>
                <div class="card-body">
                    @if($data->count() > 0)
                    <div class="row">
                        @foreach($data as $pet)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card card-outline card-info h-100">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-paw fa-4x text-info"></i>
                                    </div>
                                    <h4 class="mb-1">{{ $pet->nama }}</h4>
                                    <p class="text-muted mb-2">
                                        {{ $pet->rasHewan->nama_ras ?? '-' }}
                                        <br>
                                        <small>({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }})</small>
                                    </p>
                                    
                                    <div class="mb-3">
                                        <span class="badge {{ $pet->jenis_kelamin == 'L' ? 'badge-info' : 'badge-pink' }}" 
                                              style="{{ $pet->jenis_kelamin == 'P' ? 'background-color: #e83e8c; color: white;' : '' }}">
                                            <i class="fas {{ $pet->jenis_kelamin == 'L' ? 'fa-mars' : 'fa-venus' }} mr-1"></i>
                                            {{ $pet->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}
                                        </span>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="row text-left small">
                                        <div class="col-6">
                                            <p class="mb-1 text-muted">
                                                <i class="fas fa-birthday-cake mr-1"></i> Tanggal Lahir
                                            </p>
                                            <p class="font-weight-bold">
                                                {{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d/m/Y') : '-' }}
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 text-muted">
                                                <i class="fas fa-palette mr-1"></i> Warna/Tanda
                                            </p>
                                            <p class="font-weight-bold">{{ $pet->warna_tanda ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('pemilik.pet.show', $pet->idpet) }}" class="btn btn-info">
                                        <i class="fas fa-eye mr-1"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-paw fa-4x mb-3 d-block"></i>
                        <h5>Belum Ada Hewan Peliharaan</h5>
                        <p>Anda belum memiliki hewan peliharaan yang terdaftar di klinik ini.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
