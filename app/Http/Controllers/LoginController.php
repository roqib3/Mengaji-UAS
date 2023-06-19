<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Mengembalikan view 'login' untuk menampilkan halaman login kepada pengguna
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // Ambil variabel username dan password dari input form
        $data = [
            'nim' => $request->input('username'),
            'password' => $request->input('password')
        ];
        // Coba melakukan autentikasi dengan username dan password yang diberikan
        if (Auth::attempt($data)) {
            // Autentikasi berhasil, redirect ke halaman tertentu
            return redirect()->route('about');
        } else {
            // Autentikasi gagal, beri pesan kesalahan
            $error = "NIM atau password salah";
            return;
        }
    }
    public function logout()
    {
        //Melakukan logout pengguna dan redirect ke halaman utama
        Auth::logout();
        return redirect('/');
    }
}
