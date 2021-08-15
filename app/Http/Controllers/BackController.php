<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Artikel;
use App\Models\Gambar;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BackController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function login()
    {
        $users = session('data_login');
        if ($users !== null) {
            return redirect('dashboard')->with('gagal_beralih', 'Anda telah login, tidak dapat beralih ke halaman login!');
        }
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data_login = Login::where('username', $username)->first();
        if ($data_login) {
            if ($cek_password = Hash::check($password, $data_login->password)) {
                switch ($data_login->role) {
                    case 'admin':
                        echo 'admin berhasil';
                        $users = session(['data_login' => $data_login]);
                        return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                        break;
                    case 'author':
                        echo 'author berhasil';
                        $users = session(['data_login' => $data_login]);
                        return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                        break;
                    case 'moderator':
                        echo 'moderator berhasil';
                        $users = session(['data_login' => $data_login]);
                        return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                        break;
                }
            }
        }
        return redirect('/login')->with('gagal_login', 'Login gagal, username atau password salah')->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')->with('berhasil_logout', 'Anda telah logout!');
    }
}
