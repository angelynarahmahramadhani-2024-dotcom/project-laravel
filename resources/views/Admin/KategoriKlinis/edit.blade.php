@extends('layouts.lte.main')

@section('title', 'Edit Kategori Klinis - Admin')

@section('page-title', 'Edit Kategori Klinis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.kategoriKlinis.index') }}">Kategori Klinis</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>Form Edit Kategori Klinis
                    </h3>
                </div>
                <form action="{{ route('admin.kategoriKlinis.update', $data->idkategori_klinis) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="idkategori_klinis">
                                <i class="fas fa-hashtag mr-1"></i>ID Kategori Klinis
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   value="{{ $data->idkategori_klinis }}"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <label for="nama_kategori_klinis">
                                <i class="fas fa-stethoscope mr-1"></i>Nama Kategori Klinis <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('nama_kategori_klinis') is-invalid @enderror" 
                                   id="nama_kategori_klinis" 
                                   name="nama_kategori_klinis" 
                                   value="{{ old('nama_kategori_klinis', $data->nama_kategori_klinis) }}"
                                   placeholder="Masukkan nama kategori klinis..."
                                   required>
                            @error('nama_kategori_klinis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.kategoriKlinis.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning float-right">
                            <i class="fas fa-save mr-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection