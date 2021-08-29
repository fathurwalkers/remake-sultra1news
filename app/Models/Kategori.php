<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel;
use App\Models\ArtikelKategori;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id';
    
    protected $guarded = [];

    public function artikel()
    {
        return $this->belongsToMany(Artikel::class);
    }
}
