<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_surats', function (Blueprint $table) {
            $table->id();
            $table->string('no_ids',13);
            $table->string('no_penugasan',50);
            $table->string('tgl_penugasan',11);
            $table->string('dok_penugasan');
            $table->string('noba_kspktn',50);
            $table->string('tglk_dok',11);
            $table->string('dok_kspktn');
            $table->string('noba_pp',50);
            $table->string('tglp_dok',11);
            $table->string('dok_pp');
            $table->string('noba_stp',50);
            $table->string('tgls_dok',11);
            $table->string('dok_stp');
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
        Schema::dropIfExists('data_surat');
    }
}
