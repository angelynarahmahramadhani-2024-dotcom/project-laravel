@extends('layouts.lte.main')

@section('title', 'Data Pet')

@section('page-title', 'Data Pet')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pet</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-success card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-paw mr-2"></i>Daftar Pet
            </h3>
            <div class="card-tools">
                <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Pet
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

            <table id="tablePet" class="table table-bordered table-striped table-hover">
                <thead class="bg-success">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pet</th>
                        <th>Pemilik</th>
                        <th>Jenis</th>
                        <th>Ras</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pets as $index => $pet)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <strong>{{ $pet->nama }}</strong>
                            </td>
                            <td>{{ $pet->pemilik->user->nama ?? '-' }}</td>
                            <td>
                                <span class="badge badge-info">{{ $pet->jenisHewan->nama_jenis_hewan ?? '-' }}</span>
                            </td>
                            <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                            <td>
                                @if($pet->jenis_kelamin == 'L')
                                    <span class="badge badge-primary"><i class="fas fa-mars mr-1"></i>Jantan</span>
                                @else
                                    <span class="badge badge-danger"><i class="fas fa-venus mr-1"></i>Betina</span>
                                @endif
                            </td>
                            <td>
                                {{ $pet->tanggal_lahir ? \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d/m/Y') : '-' }}
                            </td>
                            <td>
                                <a href="{{ route('resepsionis.pet.edit', $pet->idpet) }}" 
                                   class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('resepsionis.pet.destroy', $pet->idpet) }}" 
                                      method="POST" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
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
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tablePet').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
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

        // Konfirmasi hapus
        $('.form-delete').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endpush
