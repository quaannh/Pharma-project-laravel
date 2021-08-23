<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTruyenThong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_truyen_thong', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('ten_video',100);
            $table -> string('nguon_video',200);
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
        Schema::dropIfExists('video_truyen_thong');
    }
}
