<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLogin
{
    public function handle(Request $request, Closure $next)
    {
        $users = session('data_login');
        if ($users === null) {
            return redirect('/login')->with('gagal_masuk', 'silahkan login terlebih dahulu')->withInput();
        }
        return $next($request);
    }
}
