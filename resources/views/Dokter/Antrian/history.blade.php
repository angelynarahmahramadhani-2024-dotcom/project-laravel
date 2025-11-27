@extends('layouts.lte.main')

@section('title', 'Riwayat Reservasi - Dokter')

@section('page-title', 'Riwayat Reservasi')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dokter.antrian.index') }}">Antrian</a></li>
    <li class="breadcrumb-item active">Riwayat</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Filter -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-filter mr-2"></i>Filter Data
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokter.antrian.history') }}" method="GET" class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" 
                                       value="{{ request('tanggal') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="">-- Semua Status --</option>
                                    <option value="W" {{ request('status') == 'W' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="P" {{ request('status') == 'P' ? 'selected' : '' }}>Dalam Proses</option>
                                    <option value="S" {{ request('status') == 'S' ? 'selected' : '' }}>Selesai</option>
                                    <option value="B" {{ request('status') == 'B' ? 'selected' : '' }}>Batal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-info mr-2">
                                    <i class="fas fa-search mr-1"></i> Cari
                                </button>
                                <a href="{{ route('dokter.antrian.history') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo mr-1"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-2"></i>Riwayat Semua Reservasi Saya
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('dokter.antrian.index') }}" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-list-ol mr-1"></i> Antrian Hari Ini
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="historyTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-info text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 8%">No. Urut</th>
                                <th style="width: 14%">Tanggal</th>
                                <th style="width: 18%">Pasien</th>
                                <th style="width: 15%">Pemilik</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 10%">Rekam Medis</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <span class="badge badge-info" style="font-size: 1.1em;">
                                        {{ $item->no_urut }}
                                    </span>
                                </td>
                                <td>
                                    <i class="fas fa-calendar text-muted mr-1"></i>
                                    {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('d/m/Y') }}
                                    <br>
                                    <small class="text-muted">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') }}
                                    </small>
                                </td>
                                <td>
                                    <strong><i class="fas fa-paw text-info mr-1"></i>{{ $item->pet->nama ?? '-' }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $item->pet->rasHewan->nama_ras ?? '-' }}</small>
                                </td>
                                <td>
                                    <i class="fas fa-user text-muted mr-1"></i>
                                    {{ $item->pet->pemilik->user->nama ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge {{ $item->status_badge }}">
                                        {{ $item->status_label }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($item->rekamMedis)
                                        <span class="badge badge-success">
                                            <i class="fas fa-check"></i> Ada
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            <i class="fas fa-minus"></i> Belum
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->rekamMedis)
                                        <a href="{{ route('dokter.rekammedis.show', $item->rekamMedis->idrekam_medis) }}" 
                                           class="btn btn-info btn-sm" title="Lihat Rekam Medis">
                                            <i class="fas fa-eye"></i> Lihat RM
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            <i class="fas fa-clock mr-1"></i> Menunggu RM
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                    Tidak ada data reservasi.
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
        $('#historyTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [[2, 'desc']],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
            }
        });
    });
</script>
@endpush
