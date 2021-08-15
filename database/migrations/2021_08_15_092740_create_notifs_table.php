<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifsTable extends Migration
{
    public function up()
    {
        Schema::create('notif', function (Blueprint $table) {
            $table->id();
            $table->string('notif_sender');
            $table->string('notif_header');
            $table->string('notif_body');
            $table->string('notif_type');
            $table->string('notif_waktu');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('notif');
    }
}
