<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_nilais', function (Blueprint $table) {
            $table->id();
            $table->string('no_idn',13);
            $table->bigInteger('rab');
            $table->string('dok_rab');
            $table->bigInteger('pnwrn');
            $table->string('dok_pnwrn');
            $table->bigInteger('hpp');
            $table->biginteger('lr');
            $table->bigInteger('kontrak');
            $table->string('dok_kontrak');
            $table->bigInteger('tagihan');
            $table->bigInteger('terbayar');
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
        Schema::dropIfExists('data_nilai');
    }
}
