<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel;

class Komen extends Model
{
    use HasFactory;

    protected $table = 'komen';

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
