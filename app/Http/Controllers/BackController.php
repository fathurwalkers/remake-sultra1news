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
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        // dump($request->username);
        // dump($request->password);
        // dd($request);
        $data_login = Login::where('username', $request->username)->first();
        $cek_password = Hash::check($request->password, $data_login->password);
        dd($cek_password);
        if ($data_login) {
            if ($cek_password) {
                switch ($data_login->level) {
                    case 'admin':
                        echo 'admin berhasil';
                        die;
                        $users = session(['data_login' => $data_login]);
                        return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                        break;
                    case 'author':
                        echo 'author berhasil';
                        die;
                        $users = session(['data_login' => $data_login]);
                        return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                        break;
                    case 'moderator':
                        echo 'moderator berhasil';
                        die;
                        $users = session(['data_login' => $data_login]);
                        return redirect('/dashboard')->with('berhasil_login', 'Anda telah login!');
                        break;
                }
            }
        }
        echo 'gagal';
        die;
        return redirect('/login')->with('gagal_login', 'Login gagal, username atau password salah')->withInput();
    }

    public function postRegister(Request $request)
    {
        //
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('dashboard');
    }
}
