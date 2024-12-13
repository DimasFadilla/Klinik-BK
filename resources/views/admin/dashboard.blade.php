@extends('layouts.admin')

@section('content')
@include('admin.navbar-admin')

<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Total Dokter</h5>
                    <p>{{ $dokterCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Total Pasien</h5>
                    <p>{{ $pasienCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Total Poli</h5>
                    <p>{{ $polisCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Daftar Dokter</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Poli</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
            <tr>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->poli->nama_poli ?? 'Tidak Ada' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Daftar Pasien</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->no_hp }}</td>
                <td>{{ $pasien->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
