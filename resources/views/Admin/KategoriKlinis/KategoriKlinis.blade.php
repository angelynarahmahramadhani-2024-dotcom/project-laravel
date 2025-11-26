@extends('layouts.lte.main')

@section('title', 'Kategori Klinis - Admin')

@section('page-title', 'Kategori Klinis')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Kategori Klinis</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-stethoscope mr-2"></i>Daftar Kategori Klinis
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.kategoriKlinis.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah Kategori Klinis
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <table id="kategoriKlinisTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 10%">No</th>
                                <th>ID</th>
                                <th>Nama Kategori Klinis</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="badge badge-info">{{ $item->idkategori_klinis }}</span></td>
                                <td>{{ $item->nama_kategori_klinis }}</td>
                                <td>
                                    <a href="{{ route('admin.kategoriKlinis.edit', $item->idkategori_klinis) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('admin.kategoriKlinis.delete', $item->idkategori_klinis) }}" 
                                       onclick="return confirm('Yakin mau hapus kategori klinis ini?')" 
                                       class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada data kategori klinis.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#kategoriKlinisTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
            }
        });
    });
</script>
@endpush