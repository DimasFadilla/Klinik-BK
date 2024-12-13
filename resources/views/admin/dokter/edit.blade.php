@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Dokter</h1>
    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $dokter->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" class="form-control" required>{{ $dokter->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $dokter->no_hp }}" required>
        </div>

        <div class="mb-3">
            <label for="id_poli" class="form-label">Poli</label>
            <select name="id_poli" id="id_poli" class="form-select" required>
                <option value="" disabled selected>Pilih Poli</option>
                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}" {{ $dokter->id_poli == $poli->id ? 'selected' : '' }}>
                        {{ $poli->nama_poli }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update Dokter</button>
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
