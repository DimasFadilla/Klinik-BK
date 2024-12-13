<!-- resources/views/admin/dokter/index.blade.php -->
@extends('layouts.admin')

@section('content')
@include('admin.navbar-admin')
<h1>Daftar Dokter</h1>

<a href="{{ route('dokter.create') }}" class="btn btn-primary">Tambah Dokter</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Nama Dokter</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Poli</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dokters as $dokter)
            <tr>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->alamat }}</td>
                <td>{{ $dokter->no_hp }}</td>
                <td>{{ $dokter->poli->nama_poli ?? 'Tidak ada poli' }}</td>
                <td>
                    <a href="{{ route('dokter.edit', $dokter->id) }}"class="btn btn-warning">Edit</a>
                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data Dokter ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection