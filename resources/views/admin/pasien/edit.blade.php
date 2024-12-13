@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Pasien</h1>

    <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pasien->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pasien->alamat }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_ktp" class="form-label">No. KTP</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $pasien->no_ktp }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pasien->no_hp }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_rm" class="form-label">No. RM</label>
                    <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{ $pasien->no_rm }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </div>
    </form>
</div>
@endsection
