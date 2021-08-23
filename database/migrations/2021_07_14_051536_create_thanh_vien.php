<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanh_vien', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('ma_thanh_vien',100);
            $table -> string('email',100);
            $table -> string('password',100);
            $table -> string('ho_ten',100);
            $table -> string('gioi_tinh',100);
            $table -> string('dia_chi',100);
            $table -> date('sinh_nhat');
            $table -> string('dien_thoai',100);
            $table -> string('hinh_dai_dien',100);
            $table -> double('tong_chi');
            $table -> string('hang_thanh_vien',100);
           
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
        Schema::dropIfExists('thanh_vien');
    }
}
