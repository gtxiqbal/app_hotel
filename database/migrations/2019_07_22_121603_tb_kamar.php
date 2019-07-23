<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbKamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kamar', function (Blueprint $table) {
            $table->string('kamar_kode', 15)->primary();
            $table->string('kamar_nama', 25);
            $table->text('kamar_desk');
            $table->integer('kamar_ketersediaan');
            $table->double('kamar_harga');
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
        Schema::dropIfExists('tb_kamar');
    }
}
