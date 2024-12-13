@extends('layouts.admin')

@section('content')
    <h1>Tambah Poli</h1>

    <form action="{{ route('poli.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_poli">Nama Poli</label>
            <input type="text" name="nama_poli" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
