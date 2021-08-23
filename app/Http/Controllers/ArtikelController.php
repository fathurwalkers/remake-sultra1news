<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Artikel;
use App\Models\Gambar;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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
        $gambar_cek = $request->file('gambar');
        $kategori = $request->kategori;
        $status = $request->artikel_status;
        $judul = $request->artikel_judul;
        $isi = $request->artikel_isi;

        $ExplodeJudul = explode(" ", $judul);
        dump($ExplodeJudul);
        $judulPostImplode = [];
        for ($x = 0; $x < 6; $x++) {
            // echo $ExplodeJudul[$x] . " / ";
            $newJudul = array(
                $judulPostImplode => $ExplodeJudul[$x]
            );
        }
        dump($judulPostImplode);
        dump($newJudul);
        die;

        if (!$gambar_cek) {
            $gambar = null;
        }
        $randomNamaGambar = Str::random(10) . '.jpg';
        $gambar = $request->file('gambar')->move(public_path('post-images'), strtolower($randomNamaGambar));
    }
}
