<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIsgTakipTableCalismaSuresi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isg_takip', function (Blueprint $table) {
            //
            $table->float('aylik_calisma_suresi', 8,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isg_takip', function (Blueprint $table) {
            //
            $table->integer('aylik_calisma_suresi')->change();
        });
    }
}
