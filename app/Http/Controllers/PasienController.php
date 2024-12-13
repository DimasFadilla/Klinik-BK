<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ini benar


class PasienController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
        ]);
        // Cari dokter berdasarkan nama dan alamat (password)
        $pasien = Pasien::where('nama', $request->name)
                        ->where('alamat', $request->alamat) // Gunakan 'alamat' untuk password
                        ->first();
    
        // if (Auth::guard('pasien')->attempt($pasien->id)) {
            return redirect()->route('pasien.dashboard');
        // }
    
        return back()->withErrors(['nama' => 'Email atau password salah.']);
    }

    // Tampilkan daftar pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return view('admin.pasien.index', compact('pasiens'));
    }

    
    // Menampilkan form login pasien
    public function showLoginForm()
    {
        return view('pasien.auth.pasien-login');  // Pastikan Anda memiliki view untuk form login pasien
    }

    // Menampilkan form registrasi pasien
    public function showRegistrationForm()
    {
        return view('pasien.auth.pasien-register'); // Pastikan Anda memiliki view untuk form registrasi pasien
    }

    public function show($id)
    {
    $pasien = Pasien::findOrFail($id);  // Mencari pasien berdasarkan ID
    return view('admin.pasien.show', compact('pasien'));  // Tampilkan view show
    }

    // Proses registrasi pasien
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required|numeric|unique:pasien',
            'no_hp' => 'required',
            'no_rm' => 'required|unique:pasien',
        ]);
    
        Pasien::create($request->all());
    
        return redirect()->route('pasien.login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Tampilkan form tambah pasien
    public function create()
    {
        return view('admin.pasien.create');
    }

    // Simpan data pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required|numeric|unique:pasien',
            'no_hp' => 'required',
            'no_rm' => 'required|unique:pasien',
        ]);
    
        Pasien::create($request->all());
    
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }
    

    // Tampilkan form edit pasien
    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit', compact('pasien'));
    }

    // Update data pasien
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required|numeric|unique:pasien,no_ktp,' . $pasien->id,
            'no_hp' => 'required',
            'no_rm' => 'required|unique:pasien,no_rm,' . $pasien->id,
        ]);

        $pasien->update($request->all());

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    // Hapus data pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
    public function dashboard()
    {
        $pasien = Auth::guard('pasien')->user();  // Ambil data pasien yang login
        return view('pasien.dashboard', compact('pasien'));
    }

    public function logout(Request $request)
{
    Auth::guard('pasien')->logout();
    return redirect()->route('pasien.login');
}

}
