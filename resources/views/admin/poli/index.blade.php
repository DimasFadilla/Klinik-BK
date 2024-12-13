@extends('layouts.admin')

@section('content')
@include('admin.navbar-admin')

    <h1>Daftar Poli</h1>

    <a href="{{ route('poli.create') }}" class="btn btn-primary">Tambah Poli</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Poli</th>
                <th>Keterangan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($polis as $poli)
                <tr>
                    <td>{{ $poli->nama_poli }}</td>
                    <td>{{ $poli->keterangan }}</td>
                    <td>
                        <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus poli ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
