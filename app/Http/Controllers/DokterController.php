<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli;  // Pastikan model Poli diimpor

class DokterController extends Controller
{

    public function dashboard()
{
    // Dapatkan data dokter dari session
    $dokterId = session('dokter_id');

    if (!$dokterId) {
        return redirect()->route('dokter.login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
    }

    // Ambil data dokter dan pasien terkait
    $dokter = Dokter::with('poli')->find($dokterId);
    //$pasiens = $dokter->pasiens; // Asumsikan ada relasi pasien pada model dokter

    return view('dokter.dashboard', compact('dokter', /*'pasiens'*/));
}


     // Menampilkan Data Dokter
     public function index()
     {
         $dokters = Dokter::with('poli')->get();  // Ambil semua dokter beserta nama poli mereka
         return view('admin.dokter.index', compact('dokters'));
     }
     public function show(Dokter $dokter)
{
    $dokter->load('poli');
    return view('admin.dokter.show', compact('dokter'));
}

      // Menampilkan form login dokter
    public function showLoginForm()
    {
        return view('auth.dokter-login');  // Pastikan Anda memiliki view untuk form login dokter
    }

    // Proses login dokter (opsional jika ingin menggunakan autentikasi)
    // Proses login dokter
    // Proses login dokter
public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required',
        'alamat' => 'required',
    ]);

    // Cari dokter berdasarkan nama dan alamat (password)
    $dokter = Dokter::where('nama', $request->name)
                    ->where('alamat', $request->alamat) // Gunakan 'alamat' untuk password
                    ->first();

    // Periksa apakah data dokter valid
    if ($dokter) {
        // Simpan data ke session
        session(['dokter_id' => $dokter->id, 'dokter_nama' => $dokter->nama]);

        // Redirect ke dashboard dokter
        return redirect()->route('dokter.dashboard')->with('success', 'Login berhasil!');
    }

    // Jika gagal login, kembali ke halaman login dengan pesan error
    return back()->withErrors(['login' => 'Nama atau password salah!'])->withInput();
}

    

    // Logout dokter
    public function logout()
    {
        // Hapus session
        session()->forget(['dokter_id', 'dokter_nama']);

        return redirect()->route('dokter.login')->with('success', 'Logout berhasil!');
    }

    //menambah data  dokter
    public function create()
    {
        $polis = Poli::all();
        return view('admin.dokter.create', compact('polis'));
    }

    // menyimoan data
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required|exists:poli,id', // Validasi id_poli
        ]);

        Dokter::create($request->all());
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

        // edit data dokter
    public function edit(Dokter $dokter)
    {
        $polis = Poli::all();
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    //update data dokter
    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required|exists:poli,id',
        ]);

        // Update data dokter
    $dokter->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'id_poli' => $request->id_poli,
    ]);
        return redirect()->route('dokter.index')->withwith('success', 'Data Dokter berhasil diperbarui');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index');
    }
    

}
