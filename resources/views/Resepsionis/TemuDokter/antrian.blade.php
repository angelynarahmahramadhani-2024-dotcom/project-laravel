@extends('layouts.lte.main')

@section('title', 'Antrian Hari Ini')

@section('page-title', 'Antrian Hari Ini')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.temudokter.index') }}">Temu Dokter</a></li>
    <li class="breadcrumb-item active">Antrian</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Summary Cards -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fas fa-list-ol"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Antrian</span>
                    <span class="info-box-number">{{ $antrian->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="info-box bg-secondary">
                <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Menunggu</span>
                    <span class="info-box-number">{{ $antrian->where('status', 'W')->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-user-md"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Dalam Proses</span>
                    <span class="info-box-number">{{ $antrian->where('status', 'P')->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Selesai</span>
                    <span class="info-box-number">{{ $antrian->where('status', 'S')->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Antrian Menunggu & Proses -->
        <div class="col-md-8">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-clipboard-list mr-2"></i>Antrian Aktif - {{ now()->format('d F Y') }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('resepsionis.temudokter.create') }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-plus mr-1"></i> Daftar Baru
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show m-3">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover table-striped mb-0">
                        <thead class="bg-warning">
                            <tr>
                                <th width="8%">No.</th>
                                <th>Pet</th>
                                <th>Pemilik</th>
                                <th>Dokter</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($antrian->whereIn('status', ['W', 'P']) as $item)
                                <tr class="{{ $item->status == 'P' ? 'table-info' : '' }}">
                                    <td>
                                        <span class="badge badge-lg {{ $item->status == 'P' ? 'badge-info' : 'badge-warning' }}">
                                            {{ $item->no_urut }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong>{{ $item->pet->nama ?? '-' }}</strong>
                                        <br><small class="text-muted">{{ $item->pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</small>
                                    </td>
                                    <td>
                                        {{ $item->pet->pemilik->user->nama ?? '-' }}
                                        <br><small class="text-muted">{{ $item->pet->pemilik->no_wa ?? '-' }}</small>
                                    </td>
                                    <td>{{ $item->roleUser->user->nama ?? '-' }}</td>
                                    <td>{{ $item->waktu_daftar ? \Carbon\Carbon::parse($item->waktu_daftar)->format('H:i') : '-' }}</td>
                                    <td>
                                        <span class="badge {{ $item->status_badge }}">{{ $item->status_label }}</span>
                                    </td>
                                    <td>
                                        @if($item->status == 'W')
                                            <a href="{{ route('resepsionis.temudokter.updateStatus', [$item->idreservasi_dokter, 'P']) }}" 
                                               class="btn btn-info btn-sm" title="Panggil">
                                                <i class="fas fa-bullhorn"></i> Panggil
                                            </a>
                                            <a href="{{ route('resepsionis.temudokter.updateStatus', [$item->idreservasi_dokter, 'B']) }}" 
                                               class="btn btn-danger btn-sm" title="Batal">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        @elseif($item->status == 'P')
                                            <a href="{{ route('resepsionis.temudokter.updateStatus', [$item->idreservasi_dokter, 'S']) }}" 
                                               class="btn btn-success btn-sm" title="Selesai">
                                                <i class="fas fa-check"></i> Selesai
                                            </a>
                                            <a href="{{ route('resepsionis.temudokter.updateStatus', [$item->idreservasi_dokter, 'W']) }}" 
                                               class="btn btn-secondary btn-sm" title="Kembali Menunggu">
                                                <i class="fas fa-undo"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('resepsionis.temudokter.show', $item->idreservasi_dokter) }}" 
                                           class="btn btn-default btn-sm" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                        Tidak ada antrian aktif saat ini
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="col-md-4">
            <!-- Sedang Dilayani -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-md mr-2"></i>Sedang Dilayani
                    </h3>
                </div>
                <div class="card-body p-0">
                    @php $dalamProses = $antrian->where('status', 'P'); @endphp
                    @forelse($dalamProses as $item)
                        <div class="p-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">
                                        <span class="badge badge-info mr-2">{{ $item->no_urut }}</span>
                                        {{ $item->pet->nama ?? '-' }}
                                    </h5>
                                    <p class="mb-0 text-muted small">
                                        <i class="fas fa-user mr-1"></i>{{ $item->pet->pemilik->user->nama ?? '-' }}
                                    </p>
                                    <p class="mb-0 text-muted small">
                                        <i class="fas fa-stethoscope mr-1"></i>{{ $item->roleUser->user->nama ?? '-' }}
                                    </p>
                                </div>
                                <a href="{{ route('resepsionis.temudokter.updateStatus', [$item->idreservasi_dokter, 'S']) }}" 
                                   class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="p-3 text-center text-muted">
                            <i class="fas fa-pause-circle fa-2x mb-2 d-block"></i>
                            Tidak ada yang sedang dilayani
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Selesai Hari Ini -->
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-check-double mr-2"></i>Selesai Hari Ini
                    </h3>
                </div>
                <div class="card-body p-0" style="max-height: 300px; overflow-y: auto;">
                    @php $selesai = $antrian->where('status', 'S'); @endphp
                    <ul class="list-group list-group-flush">
                        @forelse($selesai as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                <div>
                                    <span class="badge badge-success mr-2">{{ $item->no_urut }}</span>
                                    {{ $item->pet->nama ?? '-' }}
                                </div>
                                <small class="text-muted">{{ $item->roleUser->user->nama ?? '-' }}</small>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">
                                Belum ada yang selesai
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Dibatalkan -->
            @php $batal = $antrian->where('status', 'B'); @endphp
            @if($batal->count() > 0)
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-ban mr-2"></i>Dibatalkan
                    </h3>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($batal as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                <div>
                                    <span class="badge badge-danger mr-2">{{ $item->no_urut }}</span>
                                    <del>{{ $item->pet->nama ?? '-' }}</del>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto refresh setiap 30 detik
    setTimeout(function() {
        location.reload();
    }, 30000);
</script>
@endpush
