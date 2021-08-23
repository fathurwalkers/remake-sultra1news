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
            $table->string('gambar_name')->nullable();
            $table->string('gambar_slug')->nullable();
            $table->string('gambar_alt')->nullable();
            $table->string('gambar_deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gambar');
    }
}
