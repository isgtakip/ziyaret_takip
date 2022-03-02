<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsgTakip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isg_takip', function (Blueprint $table) {
            $table->id();
            $table->string('tc')->nullable();
            $table->string('ad_soyad')->nullable();
            $table->integer('gorev_turu')->nullable();
            $table->string('personel_kategori')->nullable();
            $table->integer('aylik_calisma_suresi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isg_takip');
    }
}
