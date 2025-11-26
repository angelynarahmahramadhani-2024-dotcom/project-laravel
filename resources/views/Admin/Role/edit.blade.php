@extends('layouts.lte.main')

@section('title', 'Edit Role - Admin')

@section('page-title', 'Edit Role')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Role</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-2"></i>Form Edit Role
                    </h3>
                </div>
                <form action="{{ route('admin.role.update', $data->idrole) }}" method="POST">
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
                            <label for="idrole">
                                <i class="fas fa-hashtag mr-1"></i>ID Role
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   value="{{ $data->idrole }}"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <label for="nama_role">
                                <i class="fas fa-user-tag mr-1"></i>Nama Role <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('nama_role') is-invalid @enderror" 
                                   id="nama_role" 
                                   name="nama_role" 
                                   value="{{ old('nama_role', $data->nama_role) }}"
                                   placeholder="Masukkan nama role..."
                                   required>
                            @error('nama_role')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">
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
