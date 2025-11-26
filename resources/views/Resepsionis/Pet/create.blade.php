@extends('layouts.lte.main')

@section('title', 'Tambah Pet')

@section('page-title', 'Tambah Pet')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.pet.index') }}">Pet</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Form Tambah Pet
                    </h3>
                </div>
                <form action="{{ route('resepsionis.pet.store') }}" method="POST">
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
                            <label for="idpemilik">Pemilik <span class="text-danger">*</span></label>
                            <select name="idpemilik" id="idpemilik" 
                                    class="form-control select2 @error('idpemilik') is-invalid @enderror" required>
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach($pemiliks as $pemilik)
                                    <option value="{{ $pemilik->idpemilik }}" 
                                            {{ old('idpemilik') == $pemilik->idpemilik ? 'selected' : '' }}>
                                        {{ $pemilik->user->nama ?? 'N/A' }} - {{ $pemilik->telepon }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idpemilik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Pet <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" 
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}" placeholder="Masukkan nama pet" required>
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idjenis_hewan">Jenis Hewan <span class="text-danger">*</span></label>
                                    <select name="idjenis_hewan" id="idjenis_hewan" 
                                            class="form-control select2 @error('idjenis_hewan') is-invalid @enderror" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach($jenisHewans as $jenis)
                                            <option value="{{ $jenis->idjenis_hewan }}" 
                                                    {{ old('idjenis_hewan') == $jenis->idjenis_hewan ? 'selected' : '' }}>
                                                {{ $jenis->nama_jenis_hewan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('idjenis_hewan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idras_hewan">Ras <span class="text-danger">*</span></label>
                                    <select name="idras_hewan" id="idras_hewan" 
                                            class="form-control select2 @error('idras_hewan') is-invalid @enderror" required>
                                        <option value="">-- Pilih Jenis Dulu --</option>
                                    </select>
                                    @error('idras_hewan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" 
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Jantan</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Betina</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                                           class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="warna">Warna</label>
                                    <input type="text" name="warna" id="warna" 
                                           class="form-control @error('warna') is-invalid @enderror"
                                           value="{{ old('warna') }}" placeholder="Warna bulu">
                                    @error('warna')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('resepsionis.pet.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success float-right">
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
    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: function() {
                return $(this).data('placeholder');
            }
        });

        // Get Ras by Jenis Hewan
        $('#idjenis_hewan').on('change', function() {
            var idJenis = $(this).val();
            var rasSelect = $('#idras_hewan');
            
            rasSelect.html('<option value="">Loading...</option>');
            
            if (idJenis) {
                $.ajax({
                    url: '{{ url("resepsionis/pet/get-ras") }}/' + idJenis,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        rasSelect.html('<option value="">-- Pilih Ras --</option>');
                        $.each(data, function(key, value) {
                            rasSelect.append('<option value="' + value.idras_hewan + '">' + value.nama_ras + '</option>');
                        });
                    },
                    error: function() {
                        rasSelect.html('<option value="">-- Pilih Ras --</option>');
                    }
                });
            } else {
                rasSelect.html('<option value="">-- Pilih Jenis Dulu --</option>');
            }
        });

        // Trigger change if old value exists
        @if(old('idjenis_hewan'))
            $('#idjenis_hewan').trigger('change');
            setTimeout(function() {
                $('#idras_hewan').val('{{ old('idras_hewan') }}');
            }, 500);
        @endif
    });
</script>
@endpush
