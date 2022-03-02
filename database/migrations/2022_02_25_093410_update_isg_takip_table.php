<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIsgTakipTable extends Migration
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
            $table->string('gorev_turu', 255)->change();
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
            $table->integer('gorev_turu')->change();
        });
    }
}
