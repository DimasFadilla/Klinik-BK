// Tambah di bagian pasien
public function editPertanyaan(Konsultasi $konsultasi)
{
    return view('konsultasi.pasien.edit', compact('konsultasi'));
}

public function updatePertanyaan(Request $request, Konsultasi $konsultasi)
{
    $request->validate([
        'subject' => 'required',
        'pertanyaan' => 'required',
    ]);

    $konsultasi->update([
        'subject' => $request->subject,
        'pertanyaan' => $request->pertanyaan,
    ]);

    return redirect()->route('konsultasi.pasien.index')->with('success', 'Pertanyaan berhasil diperbarui.');
}

public function deletePertanyaan(Konsultasi $konsultasi)
{
    $konsultasi->delete();

    return redirect()->route('konsultasi.pasien.index')->with('success', 'Pertanyaan berhasil dihapus.');
}

// Tambah di bagian dokter
public function editJawaban(Konsultasi $konsultasi)
{
    return view('konsultasi.dokter.edit', compact('konsultasi'));
}

public function updateJawaban(Request $request, Konsultasi $konsultasi)
{
    $request->validate([
        'jawaban' => 'required',
    ]);

    $konsultasi->update([
        'jawaban' => $request->jawaban,
    ]);

    return redirect()->route('konsultasi.dokter.index')->with('success', 'Jawaban berhasil diperbarui.');
}




// Pasien routes
Route::middleware('pasien_auth')->group(function () {
    Route::get('/konsultasi/pasien/edit/{konsultasi}', [KonsultasiController::class, 'editPertanyaan'])->name('konsultasi.pasien.edit');
    Route::post('/konsultasi/pasien/update/{konsultasi}', [KonsultasiController::class, 'updatePertanyaan'])->name('konsultasi.pasien.update');
    Route::delete('/konsultasi/pasien/delete/{konsultasi}', [KonsultasiController::class, 'deletePertanyaan'])->name('konsultasi.pasien.delete');
});

// Dokter routes
Route::middleware('dokter_auth')->group(function () {
    Route::get('/konsultasi/dokter/edit/{konsultasi}', [KonsultasiController::class, 'editJawaban'])->name('konsultasi.dokter.edit');
    Route::post('/konsultasi/dokter/update/{konsultasi}', [KonsultasiController::class, 'updateJawaban'])->name('konsultasi.dokter.update');
});



