<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ngaji;

class DataMengajiController extends Controller
{
    public function index()
    {
        // Mengembalikan view 'datamengaji' untuk menampilkan kepada pengguna
        return view('datamengaji');
    }

    //Menyimpan data mengaji yang diinput oleh pengguna
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'rekaman' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav',
            'juz' => 'required',
            'surah' => 'required',
            'ayat' => 'required',
        ]);

        // Mendapatkan file rekaman dari input form
        $rekaman = $request->file('rekaman');
        $namaRekaman = date('dmYHis') . '_' . $rekaman->getClientOriginalName();
        $path = auth()->user()->nim . '/' . $namaRekaman;

        // Menyimpan file rekaman ke dalam penyimpanan (storage)
        Storage::putFileAs('public/' . auth()->user()->nim, $rekaman, $namaRekaman);

        // Membuat entri baru dalam tabel ngaji
        Ngaji::create([
            'rekaman' => $path,
            'juz' => $request->juz,
            'surah' => $request->surah,
            'ayat' => $request->ayat,
            'nim' => auth()->user()->nim,
        ]);

        // Redirect ke halaman 'datamengaji' dengan pesan sukses
        return redirect()->route('datamengaji.index')->with('success', 'Data mengaji berhasil ditambahkan.');
    }

    //Menampilkan halaman rekapitulasi data mengaji
    public function rekap()
    {
        // Mendapatkan data mengaji berdasarkan nim pengguna yang sedang login
        $data = Ngaji::where('nim', auth()->user()->nim)->get();
        return view('rekap', compact('data'));
    }

    public function hapus($id)
    {
        // Menghapus data mengaji berdasarkan ID dan kembali ke halaman sebelumnya
        Ngaji::where('id_ngaji', $id)->delete();
        return back();
    }
}
