<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsTable extends Migration
{
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('artikel_judul', 1000);
            $table->longText('artikel_isi');
            $table->string('artikel_slug');
            $table->string('artikel_status'); // PUBLISHED - DRAFT - TRASH
            $table->date('artikel_dibuat');
            $table->unsignedBigInteger('login_id')->nullable();
            $table->foreign('login_id')->references('id')->on('login');
            $table->string('artikel_headergambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}
