@extends('layout.main')

@section('title', 'Edit Ras Hewan')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">Edit Ras Hewan 🐾</h2>

  <form action="{{ route('rashewan.update', $ras->idras_hewan) }}" method="POST" class="mx-auto" style="max-width:500px;">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Ras Hewan</label>
      <input type="text" name="nama_ras" value="{{ $ras->nama_ras }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Jenis Hewan</label>
      <select name="idjenis_hewan" class="form-select" required>
        @foreach($jenis as $j)
          <option value="{{ $j->idjenis_hewan }}" 
            {{ $ras->idjenis_hewan == $j->idjenis_hewan ? 'selected' : '' }}>
            {{ $j->nama_jenis_hewan }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('rashewan.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection
