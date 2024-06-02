<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('no_idm',13);
            $table->string('no_idn',13);
            $table->string('no_idc',13);
            $table->string('no_idpre',15);
            $table->string('no_idpni',15);
            $table->string('no_idppm',15);
            $table->string('no_ids',13);
            $table->string('prktype',10);
            $table->string('no_PRKorWO',10);
            $table->string('nm_pekerjaan',255);
            $table->string('rkap',9);
            $table->string('stts_pkerjaan',20);
            $table->string('tgl_mulai',11);
            $table->string('tgl_akhir',11);
            $table->string('stts_admin',17);
            $table->text('ket_progress');
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
        Schema::dropIfExists('data_monitoring');
    }
}
