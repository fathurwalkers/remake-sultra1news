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
        $artikel_5 = $artikel->sortByDesc('artikel_dibuat')->take(5);
        $artikel_random_3 = $artikel->random()->take(5);
        return view('home', [
            'artikel_5' => $artikel_5,
            'artikel_random_3' => $artikel_random_3,
        ]);
    }

    public function showPostDetail($slug)
    {
        $post = $slug;
        // dd($post);
        return view('homepage.show-post-detail');
    }
}
