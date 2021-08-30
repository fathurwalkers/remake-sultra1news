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
    public function contact()
    {
        return view('homepage.contact');
    }

    public function about()
    {
        return view('homepage.about');
    }

    public function index()
    {
        $artikel = Artikel::all();
        $artikel_paginate = Artikel::latest()->paginate(4);
        $artikel_trendingtop = $artikel->sortByDesc('artikel_dibuat')->take(1);
        $artikel_5 = $artikel->sortByDesc('artikel_dibuat')->take(5);
        $artikel_random_3 = $artikel->random(3);
        $artikelweekly_one = $artikel->random(4);
        $artikelweekly_two = $artikel->random(5);
        $artikel_animated = $artikel->random(5);
        return view('home', [
            'artikel_5' => $artikel_5,
            'artikel_random_3' => $artikel_random_3,
            'artikelweekly_one' => $artikelweekly_one,
            'artikelweekly_two' => $artikelweekly_two,
            'artikel_trendingtop' => $artikel_trendingtop,
            'artikel_animated' => $artikel_animated,
            'artikel_paginate' => $artikel_paginate,
        ]);
    }

    public function showPostDetail($slug)
    {
        $artikel_all = Artikel::all();
        $artikel_animated = $artikel_all->random(5);
        $post = Artikel::where('artikel_slug', $slug)->first();
        return view('homepage.show-post-detail', [
            'artikel' => $post,
            'artikel_animated' => $artikel_animated,
        ]);
    }
}
