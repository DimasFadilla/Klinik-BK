@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Data Obat</h1>

        <form action="{{ route('obat.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <!-- Nama Obat -->
                    <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
                    </div>

                    <!-- Kemasan -->
                    <div class="mb-3">
                        <label for="kemasan" class="form-label">Kemasan</label>
                        <input type="text" class="form-control" id="kemasan" name="kemasan" required>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
