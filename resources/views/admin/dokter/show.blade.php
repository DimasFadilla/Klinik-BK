<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Sesuaikan jika Anda memiliki file CSS -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Detail Dokter</h1>

        <div class="card mt-4">
            <div class="card-header">
                <h3>Informasi Dokter</h3>
            </div>
            <div class="card-body">
                <p><strong>Nama Dokter:</strong> {{ $dokter->nama }}</p>
                <p><strong>Alamat:</strong> {{ $dokter->alamat }}</p>
                <p><strong>No HP:</strong> {{ $dokter->no_hp }}</p>
                <p><strong>Poli:</strong> {{ $dokter->poli->nama_poli }}</p> <!-- Pastikan relasi poli sudah di-load -->
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-primary">Edit Dokter</a>
        </div>
    </div>
</body>
</html>
