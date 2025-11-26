@extends('layouts.lte.main')

@section('title', 'Pemilik Hewan - Admin')

@section('page-title', 'Pemilik Hewan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Pemilik Hewan</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-2"></i>Daftar Pemilik Hewan
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.pemilik.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah Pemilik
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

                    <table id="pemilikTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 8%">ID</th>
                                <th>Nama User</th>
                                <th>Alamat</th>
                                <th>No. WhatsApp</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="badge badge-info">{{ $item->idpemilik }}</span></td>
                                <td>
                                    <i class="fas fa-user text-primary mr-1"></i>
                                    {{ $item->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <i class="fas fa-map-marker-alt text-danger mr-1"></i>
                                    {{ $item->alamat }}
                                </td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_wa) }}" target="_blank" class="text-success">
                                        <i class="fab fa-whatsapp mr-1"></i>{{ $item->no_wa }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.pemilik.edit', $item->idpemilik) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.pemilik.delete', $item->idpemilik) }}" 
                                       onclick="return confirm('Yakin mau hapus data ini?')" 
                                       class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada data pemilik hewan.
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
        $('#pemilikTable').DataTable({
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