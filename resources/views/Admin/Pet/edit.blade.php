@extends('layouts.lte.main')

@section('title', 'Edit Pet - Admin')

@section('page-title', 'Edit Hewan Peliharaan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pet.index') }}">Pet</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>Form Edit Hewan Peliharaan
                    </h3>
                </div>
                <form action="{{ route('admin.pet.update', $data->idpet) }}" method="POST">
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">
                                        <i class="fas fa-paw mr-1"></i>Nama Hewan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('nama') is-invalid @enderror" 
                                           id="nama" 
                                           name="nama" 
                                           value="{{ old('nama', $data->nama) }}"
                                           placeholder="Masukkan nama hewan..."
                                           required>
                                    @error('nama')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">
                                        <i class="fas fa-birthday-cake mr-1"></i>Tanggal Lahir
                                    </label>
                                    <input type="date" 
                                           class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                           id="tanggal_lahir" 
                                           name="tanggal_lahir" 
                                           value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}">
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="warna_tanda">
                                        <i class="fas fa-palette mr-1"></i>Warna / Tanda
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('warna_tanda') is-invalid @enderror" 
                                           id="warna_tanda" 
                                           name="warna_tanda" 
                                           value="{{ old('warna_tanda', $data->warna_tanda) }}"
                                           placeholder="Contoh: Putih dengan bintik hitam">
                                    @error('warna_tanda')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin">
                                        <i class="fas fa-venus-mars mr-1"></i>Jenis Kelamin <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                            id="jenis_kelamin" 
                                            name="jenis_kelamin" 
                                            required>
                                        <option value="L" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'L' ? 'selected' : '' }}>♂ Jantan</option>
                                        <option value="P" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'P' ? 'selected' : '' }}>♀ Betina</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idpemilik">
                                        <i class="fas fa-user mr-1"></i>Pemilik <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2 @error('idpemilik') is-invalid @enderror" 
                                            id="idpemilik" 
                                            name="idpemilik" 
                                            required>
                                        <option value="">-- Pilih Pemilik --</option>
                                        @foreach($pemilik as $p)
                                            <option value="{{ $p->idpemilik }}" {{ old('idpemilik', $data->idpemilik) == $p->idpemilik ? 'selected' : '' }}>
                                                {{ $p->user->nama ?? 'Nama tidak tersedia' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('idpemilik')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idras_hewan">
                                        <i class="fas fa-dog mr-1"></i>Ras Hewan <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2 @error('idras_hewan') is-invalid @enderror" 
                                            id="idras_hewan" 
                                            name="idras_hewan" 
                                            required>
                                        <option value="">-- Pilih Ras Hewan --</option>
                                        @foreach($ras as $r)
                                            <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan', $data->idras_hewan) == $r->idras_hewan ? 'selected' : '' }}>
                                                {{ $r->nama_ras }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('idras_hewan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">
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
