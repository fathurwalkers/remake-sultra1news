<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Komen;
use App\Models\Login;
use App\Models\ArtikelKategori;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $guarded = [];
    protected $primaryKey = 'id';

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }

    public function comment()
    {
        return $this->hasMany(Komen::class);
    }

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
