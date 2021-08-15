<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Komen;
use App\Models\Login;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

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
