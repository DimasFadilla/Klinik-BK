@extends('layouts.admin')

@section('content')
    <h1>Edit Poli</h1>

    <form action="{{ route('poli.update', $poli->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_poli">Nama Poli</label>
            <input type="text" name="nama_poli" class="form-control" value="{{ $poli->nama_poli }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $poli->keterangan }}">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
