@extends('layouts.lte.main')

@section('title', 'Kode Tindakan Terapi - Admin')

@section('page-title', 'Kode Tindakan Terapi')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Kode Tindakan Terapi</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-syringe mr-2"></i>Daftar Kode Tindakan Terapi
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.KodeTindakanTerapi.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah Kode Tindakan
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

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                        </div>
                    @endif

                    <table id="kodeTindakanTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 10%">Kode</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Kategori Klinis</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="badge badge-info">{{ $item->kode }}</span></td>
                                <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                                <td><span class="badge badge-success">{{ $item->kategori->nama_kategori ?? '-' }}</span></td>
                                <td><span class="badge badge-warning">{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</span></td>
                                <td>
                                    <a href="{{ route('admin.KodeTindakanTerapi.edit', $item->idkode_tindakan_terapi) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.KodeTindakanTerapi.delete', $item->idkode_tindakan_terapi) }}" 
                                       onclick="return confirm('Yakin hapus data ini?')" 
                                       class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada data kode tindakan terapi.
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
        $('#kodeTindakanTable').DataTable({
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
