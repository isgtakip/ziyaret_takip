<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NaceKodlari extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nace_kodlari', function (Blueprint $table) {
            $table->id("nace_kod_id");
            $table->string('nace_kodu')->nullable();
            $table->string('faaliyet')->nullable();
            $table->string('tehlike_sinifi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('nace_kodlari');
    }
}
