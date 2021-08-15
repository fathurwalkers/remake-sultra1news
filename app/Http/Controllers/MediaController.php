<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;

class MediaController extends Controller
{
    public function galleryGambar()
    {
        return view('dashboard.gallery-gambar');
    }
}
