<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuaHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cua_hang', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('ten_cua_hang',100);
            $table -> string('dia_chi',200);
            $table -> string('dien_thoai',50);
            $table -> string('email',100);
            $table -> text('ma_nhung');
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cua_hang');
    }
}
