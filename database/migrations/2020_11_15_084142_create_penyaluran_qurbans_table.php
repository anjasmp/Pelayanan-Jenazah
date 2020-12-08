<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyaluranQurbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyaluran_qurbans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('mukaddimah');
            $table->integer('total_sapi');
            $table->integer('total_kambing');
            $table->integer('paket_daging');
            $table->integer('penerima');
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
        Schema::dropIfExists('penyaluran_qurbans');
    }
}
