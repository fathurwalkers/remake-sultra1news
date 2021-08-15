<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarsTable extends Migration
{
    public function up()
    {
        Schema::create('gambar', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_name');
            $table->string('gambar_slug');
            $table->string('gambar_alt');
            $table->string('gambar_deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gambar');
    }
}
