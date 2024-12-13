@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1>Dashboard Dokter</h1>
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            Selamat datang, {{ session('dokter_nama') }}
        </div>
        <div class="card-body">
            <h5>Informasi Dokter</h5>
            <ul>
                <li><strong>Nama:</strong> {{ $dokter->nama }}</li>
                <li><strong>Poli:</strong> {{ $dokter->poli->nama_poli ?? 'Belum Terdaftar' }}</li>
                <li><strong>No HP:</strong> {{ $dokter->no_hp }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
