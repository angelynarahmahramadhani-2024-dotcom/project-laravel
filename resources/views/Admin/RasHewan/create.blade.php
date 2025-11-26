@extends('layouts.lte.main')

@section('title', 'Tambah Ras Hewan - Admin')

@section('page-title', 'Tambah Ras Hewan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.rashewan.index') }}">Ras Hewan</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus-circle mr-2"></i>Form Tambah Ras Hewan
                    </h3>
                </div>
                <form action="{{ route('admin.rashewan.store') }}" method="POST">
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
                            <label for="nama_ras">
                                <i class="fas fa-paw mr-1"></i>Nama Ras Hewan <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('nama_ras') is-invalid @enderror" 
                                   id="nama_ras" 
                                   name="nama_ras" 
                                   value="{{ old('nama_ras') }}"
                                   placeholder="Masukkan nama ras hewan..."
                                   required>
                            @error('nama_ras')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="idjenis_hewan">
                                <i class="fas fa-tag mr-1"></i>Jenis Hewan <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2 @error('idjenis_hewan') is-invalid @enderror" 
                                    id="idjenis_hewan" 
                                    name="idjenis_hewan" 
                                    required>
                                <option value="">-- Pilih Jenis Hewan --</option>
                                @foreach($jenis as $j)
                                    <option value="{{ $j->idjenis_hewan }}" {{ old('idjenis_hewan') == $j->idjenis_hewan ? 'selected' : '' }}>
                                        {{ $j->nama_jenis_hewan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idjenis_hewan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.rashewan.index') }}" class="btn btn-secondary">
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
            placeholder: '-- Pilih Jenis Hewan --'
        });
    });
</script>
@endpush
