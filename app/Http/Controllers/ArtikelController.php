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
        $users = session('data_login');
        $artikel_judul = $request->artikel_judul;
        if ($artikel_judul == null) {
            $artikel_judul = null;
        } else {
            $ExplodeJudul = explode(" ", $artikel_judul);
            $judulPostImplode = [];
            for ($x = 6; $x >= 0; $x--) {
                $judulPostImplode = Arr::prepend($judulPostImplode, $ExplodeJudul[$x]);
            }
            $trimJudul = str_replace(array(',', '.', '!'), '', $judulPostImplode);
            $artikel_slug = implode("-", $trimJudul);
        }
        
        $req_date = $request->artikel_dibuat;
        $newDate = date("d-m-Y", strtotime($req_date));

        $kategori = $request->kategori;
        $artikel_status = $request->artikel_status;
        $artikel_isi = $request->artikel_isi;
        $gambar_cek = $request->file('gambar');
        if (!$gambar_cek) {
            $gambar = null;
        } else {
            $randomNamaGambar = Str::random(10) . '.jpg';
            $gambar = $request->file('gambar')->move(public_path('post-images'), strtolower($randomNamaGambar));
        }
        $saveGambar = new Gambar;
        $saveGambar = Gambar::create([
            'gambar_name' => $gambar->getFilename(),
            'gambar_slug' => $artikel_slug,
            'gambar_alt' => $artikel_slug,
            'gambar_deskripsi' => $artikel_slug,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveGambar->save();

        $saveArtikel = new Artikel;
        $saveArtikel = Artikel::create([
            'artikel_judul' => $artikel_judul,
            'artikel_isi' => $artikel_isi,
            'artikel_slug' => $artikel_slug,
            'artikel_status' => $artikel_status,
            'artikel_dibuat' => $newDate,
            'artikel_headergambar' => $saveGambar->gambar_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveArtikel->save();
        $saveArtikel->kategori()->attach($kategori);
        $saveArtikel->login()->associate($users->id);
        dd($saveArtikel);
    }
}
