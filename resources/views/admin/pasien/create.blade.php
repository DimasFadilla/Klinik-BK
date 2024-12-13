@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Pasien</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<!-- Form untuk tambah pasien -->
<form action="{{ route('pasien.store') }}" method="POST">
        @csrf  <!-- CSRF Token untuk keamanan -->

        <div class="card">
            <div class="card-body">
                <!-- Field Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Field Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Field No. KTP -->
                <div class="mb-3">
                    <label for="no_ktp" class="form-label">No. KTP</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}" required>
                    @error('no_ktp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Field No. HP -->
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Field No. RM -->
                <div class="mb-3">
                    <label for="no_rm" class="form-label">No. RM</label>
                    <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{ old('no_rm') }}" required>
                    @error('no_rm')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
