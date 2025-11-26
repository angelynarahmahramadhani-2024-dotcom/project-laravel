@extends('layouts.lte.main')

@section('title', 'Edit Kode Tindakan - Admin')

@section('page-title', 'Edit Kode Tindakan Terapi')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.KodeTindakanTerapi.index') }}">Kode Tindakan Terapi</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>Form Edit Kode Tindakan Terapi
                    </h3>
                </div>
                <form action="{{ route('admin.KodeTindakanTerapi.update', $data->idkode_tindakan_terapi) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                            </div>
                        @endif

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
                            <label for="kode">
                                <i class="fas fa-barcode mr-1"></i>Kode <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('kode') is-invalid @enderror" 
                                   id="kode" 
                                   name="kode" 
                                   value="{{ old('kode', $data->kode) }}"
                                   placeholder="Masukkan kode tindakan..."
                                   required>
                            @error('kode')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_tindakan_terapi">
                                <i class="fas fa-file-alt mr-1"></i>Deskripsi <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror" 
                                      id="deskripsi_tindakan_terapi" 
                                      name="deskripsi_tindakan_terapi" 
                                      rows="4"
                                      placeholder="Masukkan deskripsi tindakan terapi..."
                                      required>{{ old('deskripsi_tindakan_terapi', $data->deskripsi_tindakan_terapi) }}</textarea>
                            @error('deskripsi_tindakan_terapi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idkategori">
                                        <i class="fas fa-list mr-1"></i>Kategori <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2 @error('idkategori') is-invalid @enderror" 
                                            id="idkategori" 
                                            name="idkategori" 
                                            required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->idkategori }}" {{ old('idkategori', $data->idkategori) == $k->idkategori ? 'selected' : '' }}>
                                                {{ $k->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('idkategori')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idkategori_klinis">
                                        <i class="fas fa-stethoscope mr-1"></i>Kategori Klinis <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2 @error('idkategori_klinis') is-invalid @enderror" 
                                            id="idkategori_klinis" 
                                            name="idkategori_klinis" 
                                            required>
                                        <option value="">-- Pilih Kategori Klinis --</option>
                                        @foreach($kategoriKlinis as $kk)
                                            <option value="{{ $kk->idkategori_klinis }}" {{ old('idkategori_klinis', $data->idkategori_klinis) == $kk->idkategori_klinis ? 'selected' : '' }}>
                                                {{ $kk->nama_kategori_klinis }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('idkategori_klinis')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.KodeTindakanTerapi.index') }}" class="btn btn-secondary">
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

@push('scripts')
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
@endpush