@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Data Obat</h1>

    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" class="form-control" id="nama_obat" name="nama_obat" 
                   value="{{ $obat->nama_obat }}" required>
        </div>

        <div class="mb-3">
            <label for="kemasan" class="form-label">Kemasan</label>
            <input type="text" class="form-control" id="kemasan" name="kemasan" 
                   value="{{ $obat->kemasan }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" 
                   value="{{ $obat->harga }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
