<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function showForm()
    {
        $nama = ""; // Inisialisasi variabel $nama
        $nim = ""; // Inisialisasi variabel $nim
        $pst = ""; // Inisialisasi variabel $pst
        $sem = ""; // Inisialisasi variabel $sem
        $pw = ""; // Inisialisasi variabel $pw

        return view('registrasi', compact('nama', 'nim', 'pst', 'sem', 'pw'));
    }

    public function register(Request $request)
    {
        // Ambil data inputan
        $nama = $request->input('nama_lengkap');
        $nim = $request->input('nim');
        $pst = $request->input('program_studi');
        $sem = $request->input('semester');
        $pw = Hash::make($request->input('password'));

        // Cek apakah nim sudah ada terdaftar atau belum
        $datum = Mahasiswa::where('nim', $nim)->first();

        // Jika data belum terdaftar, buatkan pendaftaran
        if (!$datum) {
            // Buat folder di direktori dengan nim
            $folderPath = 'public/' . $nim;
            Storage::makeDirectory($folderPath);

            // Cek apakah ada file foto yang diunggah
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = date('dmYHis') . '_' . $foto->getClientOriginalName();
                $fotoPath = $folderPath . '/' . $fotoName;
                Storage::putFileAs('public/' . $nim, $foto, $fotoName);
            } else {
                $fotoPath = '';
            }
            echo $pw;
            
            // Simpan data mahasiswa ke dalam database
            Mahasiswa::create([
                'namaLengkap' => $nama,
                'nim' => $nim,
                'prodi' => $pst,
                'semester' => $sem,
                'password' => $pw, // Perbaikan penulisan kolom password
                'foto' => $fotoPath,
            ]);

            // Arahkan ke halaman login
            return redirect()->route('login');
        } else {
            // Jika nim ditemukan, berikan pesan error
            $error = "NIM Sudah Terdaftar!";
            return view('registrasi', compact('nama', 'nim', 'pst', 'sem', 'pw', 'error')); 
        }
    }
}
