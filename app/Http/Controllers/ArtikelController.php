<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Artikel;
use App\Models\Gambar;
use App\Models\Kategori;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function daftarArtikel()
    {
        $ok = 'daftar artikel';
        return view('dashboard.daftar-artikel', [
            'data' => $ok
        ]);
    }
}
