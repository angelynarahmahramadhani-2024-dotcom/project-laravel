@extends('layout.main')

@section('title', 'Edit Pemilik Hewan')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold text-center mb-4" style="color:#2563eb;">Edit Pemilik Hewan 🐾</h2>

  <form action="{{ route('pemilik.update', $pemilik->idpemilik) }}" method="POST" class="mx-auto" style="max-width:500px;">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-semibold">Nomor WA</label>
      <input type="text" name="no_wa" value="{{ $pemilik->no_wa }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Alamat</label>
      <textarea name="alamat" class="form-control" rows="3" required>{{ $pemilik->alamat }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">User Pemilik</label>
      <select name="iduser" class="form-select" required>
        @foreach($users as $u)
          <option value="{{ $u->iduser }}" {{ $pemilik->iduser == $u->iduser ? 'selected' : '' }}>
            {{ $u->nama }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('pemilik.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
    </div>
  </form>
</div>
@endsection