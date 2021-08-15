<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Artikel;
use App\Models\Gambar;
use App\Models\Kategori;
use Illuminate\Http\Request;
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
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        $data_login = Login::where('username', $request->username)->firstOrFail();
        $cek_password = Hash::check($request->password, $data_login->password);

        if ($data_login) {
            if ($cek_password) {
                if ($data_login->level === 'admin') {
                    $users = session(['data_login' => $data_login]);
                    return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                } elseif ($data_login->level === 'admin') {
                    $users = session(['data_login' => $data_login]);
                    return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                }
            }
        }
        Alert::success('Login berhasil', 'Anda telah berhasil login!');
        return redirect('/login')->with('gagal_login', 'Login gagal, username atau password salah')->withInput();
    }

    public function postRegister(Request $request)
    {
        //
    }
}
