@extends('layouts.lte.main')

@section('title', 'Tambah Jenis Hewan')

@section('page-title', 'Tambah Jenis Hewan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.jenishewan.index') }}">Jenis Hewan</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Jenis Hewan</h3>
            </div>
            <form action="{{ route('admin.jenishewan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_jenis_hewan">Nama Jenis Hewan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_jenis_hewan') is-invalid @enderror" 
                               id="nama_jenis_hewan" name="nama_jenis_hewan" placeholder="Masukkan nama jenis hewan" 
                               value="{{ old('nama_jenis_hewan') }}" required>
                        @error('nama_jenis_hewan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.jenishewan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
