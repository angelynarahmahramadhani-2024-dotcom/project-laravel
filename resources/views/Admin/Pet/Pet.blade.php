@extends('layouts.lte.main')

@section('title', 'Pet - Admin')

@section('page-title', 'Hewan Peliharaan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Pet</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paw mr-2"></i>Daftar Hewan Peliharaan
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.pet.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Tambah Hewan
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

                    <table id="petTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Warna/Tanda</th>
                                <th>Jenis Kelamin</th>
                                <th>Ras Hewan</th>
                                <th>Pemilik</th>
                                <th style="width: 12%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <i class="fas fa-paw text-info mr-1"></i>
                                    <strong>{{ $item->nama }}</strong>
                                </td>
                                <td>
                                    @if($item->tanggal_lahir)
                                        <i class="fas fa-birthday-cake text-warning mr-1"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y') }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->warna_tanda ?? '-' }}</td>
                                <td>
                                    @if($item->jenis_kelamin == 'L')
                                        <span class="badge badge-info"><i class="fas fa-mars mr-1"></i>Jantan</span>
                                    @else
                                        <span class="badge badge-pink" style="background-color: #e83e8c; color: white;"><i class="fas fa-venus mr-1"></i>Betina</span>
                                    @endif
                                </td>
                                <td><span class="badge badge-success">{{ $item->rasHewan->nama_ras ?? '-' }}</span></td>
                                <td>
                                    <i class="fas fa-user text-primary mr-1"></i>
                                    {{ $item->pemilik->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.pet.edit', $item->idpet) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.pet.delete', $item->idpet) }}" 
                                       onclick="return confirm('Yakin ingin hapus data ini?')" 
                                       class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada data hewan peliharaan.
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
        $('#petTable').DataTable({
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