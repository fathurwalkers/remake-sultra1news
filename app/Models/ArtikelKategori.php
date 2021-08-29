<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel;
use App\Models\Kategori;

class ArtikelKategori extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id';

    // public function kategori()
    // {
    //     return $this->hasMany(Kategori::class);
    // }

    // public function artikel()
    // {
    //     return $this->hasMany(Artikel::class);
    // }
}
