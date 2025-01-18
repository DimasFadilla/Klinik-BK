@extends('layouts.app')

@section('content')
<h1>Konsultasi Anda</h1>

<!-- Tombol Tambah Pertanyaan -->
<button data-bs-toggle="modal" data-bs-target="#addPertanyaan" class="btn btn-primary">Tambah Pertanyaan</button>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Subject</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Tanggal Konsultasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($konsultasi as $item)
        <tr>
            <td>{{ $item->subject }}</td>
            <td>{{ $item->pertanyaan }}</td>
            <td>
                @if ($item->jawaban)
                    {{ $item->jawaban }}
                @else
                    <span class="text-danger">Belum dijawab</span>
                @endif
            </td>
            <td>{{ \Carbon\Carbon::parse($item->tgl_konsultasi)->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Tambah Pertanyaan -->
<div class="modal fade" id="addPertanyaan" tabindex="-1" aria-labelledby="addPertanyaanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('konsultasi.pasien.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addPertanyaanLabel">Tambah Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                        <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="4" required></textarea>
                    </div>
                    <input type="hidden" name="id_dokter" value="1"> <!-- Ganti dengan ID dokter yang sesuai -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
