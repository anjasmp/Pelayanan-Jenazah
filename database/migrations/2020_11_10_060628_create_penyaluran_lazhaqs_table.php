<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyaluranLazhaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyaluran_lazhaqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('penerimaan_lazhaqs_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('jumlah');
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
        Schema::dropIfExists('penyaluran_lazhaqs');
    }
}
