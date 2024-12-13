<!-- resources/views/pasien/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ $pasien->nama }}</h1>
        <p>Alamat: {{ $pasien->alamat }}</p>
        <p>No. HP: {{ $pasien->no_hp }}</p>
        <p>No. KTP: {{ $pasien->no_ktp }}</p>
        <a href="{{ route('pasien.logout') }}" class="btn btn-danger">Logout</a>
    </div>
@endsection
