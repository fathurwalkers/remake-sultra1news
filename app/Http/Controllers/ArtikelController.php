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

    public function tambahArtikel()
    {
        $kategori = Kategori::all();
        return view('dashboard.tambah-artikel', [
            'kategori' => $kategori
        ]);
    }

    public function postTambahArtikel(Request $request)
    {
        // Status ( published - draft - trash -review )
        $kategori = $request->kategori;
        // if ($request->hasFile('gambar')) {
        //     $randomNamaGambar = Str::random(10) . '.jpg';
        //     // $gambar = $request->file('gambar')->store('gambar');
        // }
        $gambar_cek = $request->file('gambar');

        if (!$gambar_cek) {
            $gambar = null;
        }
        $randomNamaGambar = Str::random(10) . '.jpg';
        $gambar = $request->file('gambar')->move(public_path('post-images'), strtolower($randomNamaGambar));
        dump($gambar);
        dd($kategori);
    }
}
