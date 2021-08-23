<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHangTrongKho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hang_trong_kho', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('ma_san_pham');
            $table -> foreign('ma_san_pham') 
            ->references('id') -> on('san_pham')
            ->onDelete('cascade');   
            $table -> double('sl_trong_kho');
            $table -> double('sl_da_ban');
            $table->string('ma_lo_hang',200);
            $table->string('nguon_nhap',200);
            $table -> date('ngay_nhap');
            $table -> date('han_su_dung');
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
        Schema::dropIfExists('hang_trong_kho');
    }
}
