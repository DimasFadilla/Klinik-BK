@extends('layouts.admin')

@section('content')
@include('admin.navbar-admin')
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Obat</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr class="text-center">
                <th>Nama Obat</th>
                <th>Kemasan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obats as $obat)
                <tr class="text-center">
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->kemasan }}</td>
                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus obat ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($obats->isEmpty())
        <p class="text-center text-muted">Tidak ada data obat tersedia.</p>
    @endif
</div>
@endsection
