<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Artikel;
use App\Models\Gambar;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        $artikel_trendingtop = $artikel->sortByDesc('artikel_dibuat')->take(1);
        $artikel_5 = $artikel->sortByDesc('artikel_dibuat')->take(5);
        $artikel_random_3 = $artikel->random(3);
        $artikel_animated = $artikel->random(5);
        return view('home', [
            'artikel_5' => $artikel_5,
            'artikel_random_3' => $artikel_random_3,
            'artikel_trendingtop' => $artikel_trendingtop,
            'artikel_animated' => $artikel_animated,
        ]);
    }

    public function showPostDetail($slug)
    {
        $post = $slug;
        // dd($post);
        return view('homepage.show-post-detail');
    }
}
