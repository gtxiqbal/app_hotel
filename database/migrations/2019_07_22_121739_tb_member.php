<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_nama',50);
            $table->string('member_user',50)->unique();
            $table->string('email', 100)->unique();
            $table->string('member_alamat');
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
        Schema::dropIfExists('tb_member');
    }
}
