<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomensTable extends Migration
{
    public function up()
    {
        Schema::create('komen', function (Blueprint $table) {
            $table->id();
            $table->string('komen_sender');
            $table->text('komen_body');
            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')->references('id')->on('artikel');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komen');
    }
}
