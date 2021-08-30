<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Artikel;
use App\Models\Gambar;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;

class ArtikelController extends Controller
{
    public function daftarArtikel()
    {
        $noww = now();
        $artikel = Artikel::all();
        $ok = $artikel->sortByDesc('artikel_dibuat')->all();
        return view('dashboard.daftar-artikel', [
            'data' => $ok,
        ]);
    }

    public function daftarArtikelReview()
    {
        $ok = Artikel::where('artikel_status', 'review')->sortByDesc('artikel_dibuat')->get();
        return view('dashboard.daftar-artikel-review', [
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
            'artikel_dibuat' => $req_date,
            'artikel_headergambar' => $saveGambar->gambar_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $saveArtikel->login()->associate($users->id);
        $saveArtikel->save();
        $saveArtikel->kategori()->attach($kategori);
        return redirect()->route('daftar-artikel')->with('berhasil_posting', 'Artikel berhasil di posting!');
    }

    public function generateArtikel()
    {
        for ($op = 0; $op < 10; $op++) {
            $faker = Faker::create('id_ID');
            $dateReq = $faker->date('Y-m-d H:i:s');
            // $newDate = date(strtotime($dateReq));
    
            $iter = [3, 4, 5, 6, 7, 8];
            $randomIter = Arr::random($iter);
    
            $kategori = Kategori::all()->toArray();
            $randomKategori = Arr::random($kategori, $randomIter);
    
            $artikelStatus = ['published', 'draft', 'review'];
            $randomArtikelStatus = Arr::random($artikelStatus);
    
            $postJudul = $faker->words($randomIter, true);
            $ExplodeJudul = explode(" ", $postJudul);
            $judulPostImplode = [];
            for ($x = 1; $x < count($ExplodeJudul); $x++) {
                $judulPostImplode = Arr::prepend($judulPostImplode, $ExplodeJudul[$x]);
                $trimJudul = str_replace(array(',', '.', '!'), '', $judulPostImplode);
                $artikel_slug = implode("-", $trimJudul);
            }
            $isiPost = $faker->paragraphs($randomIter, true);
            $replaceNewLine = str_replace('\\n', "<br>", $isiPost);
            $saveArtikel = new Artikel;
            $saveArtikel = Artikel::create([
                'artikel_judul' => $postJudul,
                'artikel_isi' => $replaceNewLine,
                'artikel_slug' => $artikel_slug,
                'artikel_status' => $randomArtikelStatus,
                'artikel_dibuat' => $dateReq,
                'login_id' => 1,
                'artikel_headergambar' => '2f7c0hiwgx.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $saveArtikel->save();
            $saveArtikel->kategori()->attach($randomKategori[0]['id']);
        }
        return redirect()->route('daftar-artikel')->with('berhasil_generateArtikel', '10 Artikel telah berhasil di generate!');
    }

    public function deleteArtikel(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        return redirect()->route('daftar-artikel');
        // dd($artikel);
    }

    public function editArtikel(Artikel $artikel)
    {
        $data = $artikel;
        $kategori = Kategori::all();
        return view('dashboard.edit-artikel', [
            'kategori' => $kategori,
            'artikel' => $data
        ]);
    }

    public function updateArtikel(Request $request, Artikel $artikel)
    {
        $artikel_dibuat = $request->artikel_dibuat;
        $newDate = date('Y-m-d H:i:s', strtotime($artikel_dibuat));
    
        $iter = [3, 4, 5, 6, 7, 8];
        $randomIter = Arr::random($iter);

        $artikel_status = $request->artikel_status;

    
        $postJudul = $request->artikel_judul;
        $ExplodeJudul = explode(" ", $postJudul);
        $judulPostImplode = [];
        for ($x = 1; $x < count($ExplodeJudul); $x++) {
            $judulPostImplode = Arr::prepend($judulPostImplode, $ExplodeJudul[$x]);
            $trimJudul = str_replace(array(',', '.', '!'), '', $judulPostImplode);
            $artikel_slug = implode("-", $trimJudul);
        }
        $isiPost = $request->artikel_isi;
        $replaceNewLine = str_replace('\\n', "<br>", $isiPost);
        $saveArtikel = Artikel::where('id', $artikel->id)->first()->update([
                'artikel_judul' => $postJudul,
                'artikel_isi' => $replaceNewLine,
                'artikel_slug' => $artikel_slug,
                'artikel_status' => $artikel_status,
                'artikel_dibuat' => $newDate,
                'updated_at' => now()
            ]);
        // $saveArtikel->save();
        return redirect()->route('daftar-artikel')->with('berhasil_update', 'Artikel telah berhasil di update!');
    }
}
