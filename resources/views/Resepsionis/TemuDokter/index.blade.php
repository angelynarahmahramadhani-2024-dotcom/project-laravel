@extends('layouts.lte.main')

@section('title', 'Data Temu Dokter')

@section('page-title', 'Data Temu Dokter')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Temu Dokter</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-calendar-alt mr-2"></i>Daftar Temu Dokter
            </h3>
            <div class="card-tools">
                <a href="{{ route('resepsionis.temudokter.antrian') }}" class="btn btn-secondary btn-sm mr-2">
                    <i class="fas fa-list-ol mr-1"></i> Lihat Antrian
                </a>
                <a href="{{ route('resepsionis.temudokter.create') }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Reservasi
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

            <table id="tableTemuDokter" class="table table-bordered table-striped table-hover">
                <thead class="bg-warning">
                    <tr>
                        <th width="5%">No</th>
                        <th>No. Urut</th>
                        <th>Waktu Daftar</th>
                        <th>Pet</th>
                        <th>Pemilik</th>
                        <th>Dokter</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($temuDokters as $index => $temu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <span class="badge badge-lg badge-warning">{{ $temu->no_urut }}</span>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($temu->waktu_daftar)->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                <strong>{{ $temu->pet->nama ?? '-' }}</strong>
                                <br><small class="text-muted">{{ $temu->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</small>
                            </td>
                            <td>{{ $temu->pet->pemilik->user->nama ?? '-' }}</td>
                            <td>{{ $temu->roleUser->user->nama ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $temu->status_badge }}">{{ $temu->status_label }}</span>
                            </td>
                            <td>
                                <a href="{{ route('resepsionis.temudokter.show', $temu->idreservasi_dokter) }}" 
                                   class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($temu->status == 'W')
                                    <a href="{{ route('resepsionis.temudokter.edit', $temu->idreservasi_dokter) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('resepsionis.temudokter.destroy', $temu->idreservasi_dokter) }}" 
                                          method="POST" class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
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
        $('#tableTemuDokter').DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[2, 'desc']],
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
