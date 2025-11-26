@extends('layouts.lte.main')

@section('title', 'Detail Reservasi')

@section('page-title', 'Detail Reservasi')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('resepsionis.temudokter.index') }}">Temu Dokter</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-file-alt mr-2"></i>Detail Reservasi #{{ $temuDokter->no_urut }}
                    </h3>
                    <div class="card-tools">
                        <span class="badge {{ $temuDokter->status_badge }} badge-lg">{{ $temuDokter->status_label }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Info Reservasi -->
                            <div class="card card-warning card-outline">
                                <div class="card-header py-2">
                                    <h5 class="card-title mb-0"><i class="fas fa-calendar-check mr-2"></i>Info Reservasi</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <th width="40%">No. Urut</th>
                                            <td><span class="badge badge-warning badge-lg">{{ $temuDokter->no_urut }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Daftar</th>
                                            <td>{{ $temuDokter->waktu_daftar ? \Carbon\Carbon::parse($temuDokter->waktu_daftar)->format('d/m/Y H:i') : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><span class="badge {{ $temuDokter->status_badge }}">{{ $temuDokter->status_label }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Dokter</th>
                                            <td>{{ $temuDokter->roleUser->user->nama ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Info Pet -->
                            <div class="card card-success card-outline">
                                <div class="card-header py-2">
                                    <h5 class="card-title mb-0"><i class="fas fa-paw mr-2"></i>Info Pet</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <th width="40%">Nama</th>
                                            <td><strong>{{ $temuDokter->pet->nama ?? '-' }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis</th>
                                            <td>{{ $temuDokter->pet->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ras</th>
                                            <td>{{ $temuDokter->pet->rasHewan->nama_ras ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>
                                                @if($temuDokter->pet->jenis_kelamin == 'L')
                                                    <span class="badge badge-primary"><i class="fas fa-mars mr-1"></i>Jantan</span>
                                                @else
                                                    <span class="badge badge-danger"><i class="fas fa-venus mr-1"></i>Betina</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Info Pemilik -->
                    <div class="card card-info card-outline">
                        <div class="card-header py-2">
                            <h5 class="card-title mb-0"><i class="fas fa-user mr-2"></i>Info Pemilik</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <th width="30%">Nama</th>
                                            <td>{{ $temuDokter->pet->pemilik->user->nama ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $temuDokter->pet->pemilik->user->email ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <th width="30%">Telepon</th>
                                            <td>{{ $temuDokter->pet->pemilik->telepon ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $temuDokter->pet->pemilik->alamat ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Keluhan -->
                    @if($temuDokter->keluhan)
                    <div class="card card-secondary card-outline">
                        <div class="card-header py-2">
                            <h5 class="card-title mb-0"><i class="fas fa-comment-medical mr-2"></i>Keluhan / Catatan</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $temuDokter->keluhan }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Aksi Status -->
                    <div class="card card-dark card-outline">
                        <div class="card-header py-2">
                            <h5 class="card-title mb-0"><i class="fas fa-cogs mr-2"></i>Update Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="btn-group" role="group">
                                @if($temuDokter->status == 'W')
                                    <a href="{{ route('resepsionis.temudokter.updateStatus', [$temuDokter->idreservasi_dokter, 'P']) }}" 
                                       class="btn btn-info">
                                        <i class="fas fa-play mr-1"></i> Proses
                                    </a>
                                    <a href="{{ route('resepsionis.temudokter.updateStatus', [$temuDokter->idreservasi_dokter, 'B']) }}" 
                                       class="btn btn-danger">
                                        <i class="fas fa-times mr-1"></i> Batal
                                    </a>
                                @elseif($temuDokter->status == 'P')
                                    <a href="{{ route('resepsionis.temudokter.updateStatus', [$temuDokter->idreservasi_dokter, 'S']) }}" 
                                       class="btn btn-success">
                                        <i class="fas fa-check mr-1"></i> Selesai
                                    </a>
                                    <a href="{{ route('resepsionis.temudokter.updateStatus', [$temuDokter->idreservasi_dokter, 'W']) }}" 
                                       class="btn btn-secondary">
                                        <i class="fas fa-undo mr-1"></i> Kembali Menunggu
                                    </a>
                                @elseif($temuDokter->status == 'S')
                                    <span class="text-success"><i class="fas fa-check-circle mr-1"></i> Reservasi telah selesai</span>
                                @elseif($temuDokter->status == 'B')
                                    <span class="text-danger"><i class="fas fa-ban mr-1"></i> Reservasi dibatalkan</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('resepsionis.temudokter.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                    @if($temuDokter->status == 'W')
                        <a href="{{ route('resepsionis.temudokter.edit', $temuDokter->idreservasi_dokter) }}" 
                           class="btn btn-warning float-right">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
