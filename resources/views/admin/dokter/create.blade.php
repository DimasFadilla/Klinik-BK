<!-- resources/views/dokter/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Dokter</h1>

        <form action="{{ route('dokter.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama Dokter</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="no_hp" class="form-label">No. HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="id_poli" class="form-label">Poli</label>
                <select name="id_poli" id="id_poli" class="form-select" required>
                    @foreach ($polis as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Dokter</button>
        </form>
    </div>
@endsection
