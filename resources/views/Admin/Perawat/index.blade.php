@extends('layouts.lte.main')

@section('title', 'Data Perawat')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
                </div>
            @endif

            @if($usersTanpaDataPerawat->count() > 0)
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                    Ada <strong>{{ $usersTanpaDataPerawat->count() }}</strong> user dengan role Perawat yang belum memiliki data lengkap:
                    <ul class="mb-0 mt-2">
                        @foreach($usersTanpaDataPerawat as $user)
                            <li>{{ $user->nama }} ({{ $user->email }})</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('admin.perawat.create') }}" class="btn btn-sm btn-warning mt-2">
                        <i class="fas fa-plus"></i> Lengkapi Data Sekarang
                    </a>
                </div>
            @endif

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-nurse mr-2"></i>Data Perawat
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.perawat.create') }}" class="btn btn-sm btn-info">
                            <i class="fas fa-plus mr-1"></i> Tambah Data Perawat
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tabel-perawat" class="table table-bordered table-striped table-hover">
                        <thead class="bg-info">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pendidikan</th>
                                <th>No. HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $perawat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $perawat->user->nama ?? '-' }}</td>
                                <td>{{ $perawat->user->email ?? '-' }}</td>
                                <td>{{ $perawat->pendidikan ?? '-' }}</td>
                                <td>{{ $perawat->no_hp ?? '-' }}</td>
                                <td>
                                    @if($perawat->jenis_kelamin == 'L')
                                        <span class="badge badge-primary">Laki-laki</span>
                                    @elseif($perawat->jenis_kelamin == 'P')
                                        <span class="badge badge-success">Perempuan</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $perawat->alamat ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.perawat.edit', $perawat->id_perawat) }}" 
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.perawat.destroy', $perawat->id_perawat) }}" 
                                          method="POST" class="d-inline" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data perawat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
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
$(document).ready(function() {
    $('#tabel-perawat').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(difilter dari _MAX_ total data)",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });
});
</script>
@endpush
