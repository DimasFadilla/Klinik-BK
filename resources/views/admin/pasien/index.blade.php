@extends('layouts.admin')

@section('content')
@include('admin.navbar-admin')
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Pasien</h1>

    <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. KTP</th>
                <th>No. HP</th>
                <th>No. RM</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->no_ktp }}</td>
                <td>{{ $pasien->no_hp }}</td>
                <td>{{ $pasien->no_rm }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
