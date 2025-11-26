@extends('layouts.lte.main')

@section('title', 'Tambah Pemilik - Admin')

@section('page-title', 'Tambah Pemilik Hewan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pemilik.index') }}">Pemilik Hewan</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus-circle mr-2"></i>Form Tambah Pemilik Hewan
                    </h3>
                </div>
                <form action="{{ route('admin.pemilik.store') }}" method="POST">
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
                            <label for="iduser">
                                <i class="fas fa-user mr-1"></i>User Pemilik <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2 @error('iduser') is-invalid @enderror" 
                                    id="iduser" 
                                    name="iduser" 
                                    required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $u)
                                    <option value="{{ $u->iduser }}" {{ old('iduser') == $u->iduser ? 'selected' : '' }}>
                                        {{ $u->nama }} ({{ $u->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('iduser')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_wa">
                                <i class="fab fa-whatsapp mr-1"></i>Nomor WhatsApp <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('no_wa') is-invalid @enderror" 
                                   id="no_wa" 
                                   name="no_wa" 
                                   value="{{ old('no_wa') }}"
                                   placeholder="Contoh: 08123456789"
                                   required>
                            @error('no_wa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">
                                <i class="fas fa-map-marker-alt mr-1"></i>Alamat <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      id="alamat" 
                                      name="alamat" 
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap..."
                                      required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fas fa-save mr-1"></i> Simpan
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
            theme: 'bootstrap4',
            placeholder: '-- Pilih User --'
        });
    });
</script>
@endpush
