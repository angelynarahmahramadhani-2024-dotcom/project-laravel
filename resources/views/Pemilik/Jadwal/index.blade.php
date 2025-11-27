@extends('layouts.lte.main')

@section('title', 'Jadwal Temu Dokter - Pemilik')

@section('page-title', 'Jadwal Temu Dokter')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pemilik.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Jadwal Temu Dokter</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt mr-2"></i>Semua Jadwal Temu Dokter
                    </h3>
                </div>
                <div class="card-body">
                    <table id="jadwalTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 12%">Tanggal</th>
                                <th style="width: 8%">No. Urut</th>
                                <th style="width: 15%">Hewan</th>
                                <th style="width: 15%">Dokter</th>
                                <th style="width: 20%">Keluhan</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $jadwal)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <i class="fas fa-calendar text-muted mr-1"></i>
                                    {{ $jadwal->waktu_daftar ? \Carbon\Carbon::parse($jadwal->waktu_daftar)->format('d/m/Y') : '-' }}
                                    <br>
                                    <small class="text-muted">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ $jadwal->waktu_daftar ? \Carbon\Carbon::parse($jadwal->waktu_daftar)->format('H:i') : '' }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-lg badge-secondary" style="font-size: 1.2em;">
                                        {{ $jadwal->no_urut }}
                                    </span>
                                </td>
                                <td>
                                    <strong><i class="fas fa-paw text-info mr-1"></i>{{ $jadwal->pet->nama ?? '-' }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $jadwal->pet->rasHewan->nama_ras ?? '-' }}</small>
                                </td>
                                <td>
                                    <small>
                                        <i class="fas fa-user-md text-info mr-1"></i>
                                        {{ $jadwal->roleUser->user->nama ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <small>{{ Str::limit($jadwal->keluhan, 40) ?? '-' }}</small>
                                </td>
                                <td>
                                    <span class="badge {{ $jadwal->status_badge }}">
                                        {{ $jadwal->status_label }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('pemilik.jadwal.show', $jadwal->idreservasi_dokter) }}" 
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-calendar-times fa-3x mb-3 d-block"></i>
                                    Belum ada jadwal temu dokter.
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
        $('#jadwalTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [[1, 'desc']],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
            }
        });
    });
</script>
@endpush
