@extends('layout.main')

@section('title', 'Edit Hewan Peliharaan')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold text-primary mb-4">Edit Hewan Peliharaan</h2>

  <form action="{{ route('pet.update', $data->idpet) }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Nama Hewan</label>
      <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" class="form-control">
    </div>

    <div class="mb-3">
      <label>Warna / Tanda</label>
      <input type="text" name="warna_tanda" value="{{ $data->warna_tanda }}" class="form-control">
    </div>

    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" required>
        <option value="L" {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>Jantan ♂</option>
        <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Betina ♀</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Pemilik</label>
      <select name="idpemilik" class="form-control" required>
        @foreach($pemilik as $p)
          <option value="{{ $p->idpemilik }}" {{ $data->idpemilik == $p->idpemilik ? 'selected' : '' }}>
            {{ $p->user->nama ?? 'Nama tidak tersedia' }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Ras Hewan</label>
      <select name="idras_hewan" class="form-control" required>
        @foreach($ras as $r)
          <option value="{{ $r->idras_hewan }}" {{ $data->idras_hewan == $r->idras_hewan ? 'selected' : '' }}>
            {{ $r->nama_ras }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">💾 Update</button>
      <a href="{{ route('pet.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </div>
  </form>
</div>
@endsection
