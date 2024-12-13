@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Registrasi Pasien</h2>
                <form action="{{ route('pasien.register.submit') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_ktp">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_rm">No RM</label>
                        <input type="text" class="form-control" id="no_rm" name="no_rm" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    <div class="text-center mt-3">
                        <a href="{{ route('pasien.login') }}">Sudah punya akun? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
