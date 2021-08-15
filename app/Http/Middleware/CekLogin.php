<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLogin
{
    public function handle(Request $request, Closure $next)
    {
        $users = session('data_login');
        if ($users == null) {
            echo 'if berhasil';
            die;
            redirect('/login')->with('gagal_login', 'Login gagal, username atau password salah')->withInput();
        } else {
            echo 'if gagal';
            die;
            return $next($request);
        }
    }
}
